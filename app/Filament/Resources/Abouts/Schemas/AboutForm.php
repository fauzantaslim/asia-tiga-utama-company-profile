<?php

namespace App\Filament\Resources\Abouts\Schemas;

use Filament\Forms\Components\SpatieMediaLibraryFileUpload;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\RichEditor;
use Filament\Schemas\Schema;

class AboutForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                Textarea::make('description')
                    ->required()
                    ->columnSpanFull(),
                RichEditor::make('vision')
                    ->required()
                    ->columnSpanFull(),
                RichEditor::make('mission')
                    ->required()
                    ->columnSpanFull(),
                SpatieMediaLibraryFileUpload::make('image')
                    ->collection('image')
                    ->image()
                    ->imageEditor()
                    ->imageCropAspectRatio('16:9')
                    ->imageResizeTargetWidth(1200)
                    ->imageResizeTargetHeight(675)
                    ->maxSize(2048) // 2MB limit
                    ->required(),
            ]);
    }
}
