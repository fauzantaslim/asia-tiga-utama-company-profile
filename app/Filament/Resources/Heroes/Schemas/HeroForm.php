<?php

namespace App\Filament\Resources\Heroes\Schemas;

use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\SpatieMediaLibraryFileUpload;
use Filament\Schemas\Schema;

class HeroForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                TextInput::make('title')
                    ->required()
                    ->maxLength(255),
                Textarea::make('subtitle')
                    ->required()
                    ->columnSpanFull(),
                TextInput::make('button_text')
                    ->required()
                    ->maxLength(255),
                SpatieMediaLibraryFileUpload::make('background_image')
                    ->collection('background_image')
                    ->image()
                    ->multiple()
                    ->required(),
            ]);
    }
}
