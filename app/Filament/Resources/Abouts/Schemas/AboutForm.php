<?php

namespace App\Filament\Resources\Abouts\Schemas;

use Filament\Forms\Components\SpatieMediaLibraryFileUpload;
use Filament\Forms\Components\Textarea;
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
                Textarea::make('vision')
                    ->required()
                    ->columnSpanFull(),
                Textarea::make('mission')
                    ->required()
                    ->columnSpanFull(),
                SpatieMediaLibraryFileUpload::make('image')
                    ->collection('image')
                    ->image()
                    ->required(),
            ]);
    }
}
