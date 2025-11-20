<?php

namespace App\Filament\Resources\Portofolios;

use App\Filament\Resources\Portofolios\Pages\CreatePortfolio;
use App\Filament\Resources\Portofolios\Pages\EditPortfolio;
use App\Filament\Resources\Portofolios\Pages\ListPortfolios;
use App\Filament\Resources\Portofolios\Schemas\PortfolioForm;
use App\Filament\Resources\Portofolios\Tables\PortofoliosTable;
use App\Models\Portfolio;
use BackedEnum;
use Filament\Resources\Resource;
use Filament\Schemas\Schema;
use Filament\Support\Icons\Heroicon;
use Filament\Tables\Table;

class PortfolioResource extends Resource
{
    protected static ?string $model = Portfolio::class;

    protected static string|BackedEnum|null $navigationIcon = Heroicon::OutlinedRectangleStack;

    protected static ?string $recordTitleAttribute = 'title';

    public static function form(Schema $schema): Schema
    {
        return PortfolioForm::configure($schema);
    }

    public static function table(Table $table): Table
    {
        return PortofoliosTable::configure($table);
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
            'index' => ListPortfolios::route('/'),
            'create' => CreatePortfolio::route('/create'),
            'edit' => EditPortfolio::route('/{record}/edit'),
        ];
    }
}
