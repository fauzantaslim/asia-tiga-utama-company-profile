<?php

namespace App\Filament\Resources\CompanyInfos\Schemas;

use Filament\Forms\Components\SpatieMediaLibraryFileUpload;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Textarea;
use Filament\Schemas\Schema;

class CompanyInfoForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                TextInput::make('email')
                    ->label('Email Address')
                    ->email()
                    ->maxLength(255),
                TextInput::make('phone')
                    ->tel()
                    ->maxLength(255),
                TextInput::make('address')
                    ->maxLength(255),
                Textarea::make('google_map_embed_link')
                    ->columnSpanFull(),
                TextInput::make('instagram')
                    ->maxLength(255),
                TextInput::make('facebook')
                    ->maxLength(255),
                TextInput::make('youtube')
                    ->maxLength(255),
                TextInput::make('website_name')
                    ->maxLength(255),
                TextInput::make('meta_title')
                    ->maxLength(255),
                TextInput::make('meta_description')
                    ->maxLength(255),
                TextInput::make('meta_keywords')
                    ->maxLength(255),
                SpatieMediaLibraryFileUpload::make('logo_website')
                    ->collection('logo_website')
                    ->image(),
            ]);
    }
}
