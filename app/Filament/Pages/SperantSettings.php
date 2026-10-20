<?php

namespace App\Filament\Pages;

use App\Models\SperantSetting;
use App\Services\SperantService;
use BackedEnum;
use UnitEnum;
use Filament\Actions\Action;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Toggle;
use Filament\Notifications\Notification;
use Filament\Pages\Page;
use Filament\Schemas\Components\Actions;
use Filament\Schemas\Components\EmbeddedSchema;
use Filament\Schemas\Components\Form;
use Filament\Schemas\Components\Section;
use Filament\Schemas\Schema;
use Illuminate\Http\Client\RequestException;
use Throwable;

/**
 * Configuración de la integración con el CRM Sperant (reemplaza a las variables SPERANT_* del .env).
 */
class SperantSettings extends Page
{
    protected static string|BackedEnum|null $navigationIcon = 'heroicon-o-arrows-right-left';

    protected static string|UnitEnum|null $navigationGroup = 'Inmobiliaria';

    protected static ?string $navigationLabel = 'Integración Sperant';

    protected static ?string $title = 'Integración Sperant';

    protected static ?string $slug = 'integracion-sperant';

    public ?array $data = [];

    public function mount(SperantService $sperant): void
    {
        // Se muestran los valores vigentes (BD o .env); el token nunca se envía al navegador
        $this->form->fill(collect(SperantSetting::KEYS)
            ->reject(fn ($key) => $key === 'token')
            ->mapWithKeys(fn ($key) => [$key => $sperant->setting($key)])
            ->all());
    }

    public function form(Schema $schema): Schema
    {
        return $schema
            ->statePath('data')
            ->components([
                Section::make('Conexión')
                    ->columns(2)
                    ->components([
                        Toggle::make('enabled')
                            ->label('Enviar leads a Sperant')
                            ->helperText('Si está desactivado, los formularios siguen funcionando pero no se envían al CRM.')
                            ->columnSpanFull(),
                        TextInput::make('url')
                            ->label('URL de la API')
                            ->url()
                            ->required()
                            ->placeholder('https://api.sperant.com'),
                        TextInput::make('clients_endpoint')
                            ->label('Endpoint de clientes')
                            ->required()
                            ->placeholder('/v3/clients'),
                        TextInput::make('token')
                            ->label('Token de la API')
                            ->password()
                            ->revealable()
                            ->autocomplete('new-password')
                            ->placeholder(fn () => filled(app(SperantService::class)->setting('token')) ? '•••••••• (guardado)' : null)
                            ->helperText('Déjalo vacío para mantener el token actual.')
                            ->dehydrated(fn ($state) => filled($state))
                            ->columnSpanFull(),
                    ]),

                Section::make('Valores por defecto')
                    ->description('Se usan para todos los leads de la web.')
                    ->columns(2)
                    ->components([
                        TextInput::make('input_channel_id')
                            ->label('Canal de entrada (ID)')
                            ->integer()
                            ->required(),
                        TextInput::make('source_id')
                            ->label('Medio de captación (ID)')
                            ->integer()
                            ->required(),
                        TextInput::make('interest_type_id')
                            ->label('Nivel de interés (ID)')
                            ->integer()
                            ->required(),
                        TextInput::make('default_project_id')
                            ->label('Proyecto por defecto (ID)')
                            ->helperText('Para leads de Contáctanos o de proyectos sin ID de Sperant.')
                            ->integer()
                            ->required(),
                    ]),

                Section::make('Google Ads')
                    ->description('Leads que llegan desde anuncios de Google Ads (gclid o utm_source=google y utm_medium=cpc). Si se dejan vacíos, se usan los valores por defecto.')
                    ->columns(2)
                    ->components([
                        TextInput::make('google_ads_source_id')
                            ->label('Medio de captación (ID)')
                            ->integer(),
                        TextInput::make('google_ads_input_channel_id')
                            ->label('Canal de entrada (ID)')
                            ->integer(),
                    ]),

                Section::make('Facebook e Instagram Ads')
                    ->description('Leads de anuncios de Meta. Se identifican por los UTMs del anuncio: utm_source=fb/facebook o ig/instagram y un utm_medium de pago (paid_social, cpc...). Si se dejan vacíos, se usan los valores por defecto.')
                    ->columns(2)
                    ->components([
                        TextInput::make('facebook_ads_source_id')
                            ->label('Medio de captación Facebook (ID)')
                            ->integer(),
                        TextInput::make('instagram_ads_source_id')
                            ->label('Medio de captación Instagram (ID)')
                            ->helperText('Si se deja vacío, usa el de Facebook.')
                            ->integer(),
                        TextInput::make('meta_ads_input_channel_id')
                            ->label('Canal de entrada (ID)')
                            ->integer(),
                    ]),
            ]);
    }

    public function content(Schema $schema): Schema
    {
        return $schema
            ->components([
                Form::make([EmbeddedSchema::make('form')])
                    ->id('form')
                    ->livewireSubmitHandler('save')
                    ->footer([
                        Actions::make([
                            Action::make('save')
                                ->label('Guardar')
                                ->submit('save')
                                ->keyBindings(['mod+s']),
                        ]),
                    ]),
            ]);
    }

    public function save(): void
    {
        $setting = SperantSetting::query()->firstOrNew();
        $setting->fill($this->form->getState())->save();

        $this->form->fill([...$this->data, 'token' => null]);

        Notification::make()
            ->success()
            ->title('Configuración de Sperant guardada')
            ->send();
    }

    protected function getHeaderActions(): array
    {
        return [
            Action::make('testConnection')
                ->label('Probar conexión')
                ->icon('heroicon-o-signal')
                ->color('gray')
                ->action(function (SperantService $sperant) {
                    try {
                        $sperant->testConnection();

                        Notification::make()->success()->title('Conexión exitosa con Sperant')->send();
                    } catch (Throwable $e) {
                        Notification::make()
                            ->danger()
                            ->title('No se pudo conectar con Sperant')
                            ->body($e instanceof RequestException ? 'Respuesta HTTP '.$e->response->status().'. Revisa la URL y el token guardados.' : $e->getMessage())
                            ->send();
                    }
                }),

            Action::make('catalogs')
                ->label('Ver IDs de Sperant')
                ->hidden()
                ->icon('heroicon-o-list-bullet')
                ->color('gray')
                ->modalHeading('IDs disponibles en Sperant')
                ->modalSubmitAction(false)
                ->modalCancelActionLabel('Cerrar')
                ->modalContent(fn (SperantService $sperant) => view('filament.pages.sperant-catalogs', [
                    'catalogs' => $this->loadCatalogs($sperant),
                ])),
        ];
    }

    protected function loadCatalogs(SperantService $sperant): array
    {
        $resources = [
            'input_channels' => 'Canales de entrada',
            'captation_ways' => 'Medios de captación',
            'interest_types' => 'Niveles de interés',
            'projects' => 'Proyectos',
        ];

        return collect($resources)->map(function ($title, $resource) use ($sperant) {
            try {
                $rows = collect($sperant->list($resource))->map(fn ($item) => [
                    'id' => $item['attributes']['id'] ?? $item['id'],
                    'name' => $item['attributes']['name'] ?? '',
                ])->all();

                return ['title' => $title, 'rows' => $rows, 'error' => null];
            } catch (Throwable $e) {
                return ['title' => $title, 'rows' => [], 'error' => 'No se pudo consultar: '.$e->getMessage()];
            }
        })->values()->all();
    }
}
