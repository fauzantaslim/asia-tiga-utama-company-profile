<?php

namespace App\Filament\Resources\CompanyInfos;

use App\Filament\Resources\CompanyInfos\Pages\EditCompanyInfo;
use App\Filament\Resources\CompanyInfos\Schemas\CompanyInfoForm;
use App\Models\CompanyInfo;
use BackedEnum;
use Filament\Resources\Resource;
use Filament\Schemas\Schema;
use Filament\Support\Icons\Heroicon;

class CompanyInfoResource extends Resource
{
    protected static ?string $model = CompanyInfo::class;

    protected static string|BackedEnum|null $navigationIcon = Heroicon::OutlinedRectangleStack;

    protected static ?string $navigationLabel = 'Company Info';

    public static function form(Schema $schema): Schema
    {
        return CompanyInfoForm::configure($schema);
    }

    public static function getRelations(): array
    {
        return [
            //
        ];
    }

    public static function getPages(): array
    {
        return [
            'index' => EditCompanyInfo::route('/'),
        ];
    }
}
