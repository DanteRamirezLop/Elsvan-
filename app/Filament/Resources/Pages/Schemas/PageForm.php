<?php

namespace App\Filament\Resources\Pages\Schemas;

use Filament\Forms\Components\DateTimePicker;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\Toggle;
use Filament\Schemas\Schema;
use Filament\Forms\Components\RichEditor;
use Filament\Forms\Components\FileUpload;

class PageForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                TextInput::make('title')
                    ->required(),
                TextInput::make('slug')
                    ->required(),
                TextInput::make('tag')->required(),
                TextInput::make('meta_title'),
                Textarea::make('meta_description')
                    ->columnSpanFull(),


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
                     ->extraInputAttributes([
                        'style' => 'min-height: 250px;',
                    ])
                    ->columnSpanFull(),

                Textarea::make('info_1')
                    ->label('Información 1')
                    ->rows(4),

                Textarea::make('info_2')
                    ->label('Información 2')
                    ->rows(4),

                Textarea::make('info_3')
                    ->label('Información 3')
                    ->rows(4),

                FileUpload::make('image')
                    ->label('Imagen')
                    ->image()
                    ->disk('public')
                    ->directory('pages')
                    ->visibility('public')
                    ->imageEditor()
                    ->maxSize(2048),

                Toggle::make('is_published')
                    ->required(),
                DateTimePicker::make('published_at'),
            ]);
    }
}
