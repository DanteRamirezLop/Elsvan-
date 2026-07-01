<?php

namespace App\Filament\Resources\Articles\Schemas;

use Filament\Forms\Components\DateTimePicker;
use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\Toggle;
use Filament\Schemas\Schema;

use Filament\Forms\Components\RichEditor;
use Filament\Schemas\Components\Utilities\Get;
use Filament\Schemas\Components\Utilities\Set;
use Illuminate\Support\Str;


class ArticleForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema->components([
                TextInput::make('title')
                    ->label('Título')
                    ->required()
                    ->maxLength(255)
                    ->live(onBlur: true)
                    ->afterStateUpdated(
                        fn (Set $set, ?string $state) =>
                            $set('slug', Str::slug($state ?? ''))
                    ),

                TextInput::make('slug')
                    ->label('Slug')
                    ->required()
                    ->maxLength(255)
                    ->unique(ignoreRecord: true)
                    ->helperText('Se utilizará en la URL del artículo.'),

                Textarea::make('excerpt')
                    ->label('Resumen')
                    ->rows(3)
                    ->maxLength(500)
                    ->columnSpanFull(),

                TextInput::make('tags')
                    ->label('Tags')
                    ->required()
                    ->maxLength(255),

                FileUpload::make('image')
                    ->label('Imagen principal')
                    ->image()
                    ->disk('public')
                    ->directory('articles')
                    ->visibility('public')
                    ->imageEditor(),


                RichEditor::make('content')
                    ->label('Contenido')
                    ->required()
                    ->fileAttachmentsDisk('public')
                    ->fileAttachmentsDirectory('articles/content')
                    ->fileAttachmentsVisibility('public')
                    ->toolbarButtons([
                        ['bold', 'italic', 'underline', 'strike', 'link'],
                        ['h2', 'h3'],
                        ['blockquote', 'bulletList', 'orderedList'],
                        ['attachFiles'],
                        ['undo', 'redo'],
                    ])
                    ->columnSpanFull(),

                Toggle::make('is_published')
                    ->label('Publicado')
                    ->default(false)
                    ->live(),

                DateTimePicker::make('published_at')
                    ->label('Fecha de publicación')
                    ->seconds(false)
                    ->visible(
                        fn (Get $get): bool =>
                            (bool) $get('is_published')
                    )
                    ->required(
                        fn (Get $get): bool =>
                            (bool) $get('is_published')
                    ),
            ])->columns(2);
    }
}
