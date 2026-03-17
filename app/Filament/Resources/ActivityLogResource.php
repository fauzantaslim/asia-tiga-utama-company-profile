<?php

namespace App\Filament\Resources;

use App\Filament\Resources\ActivityLogResource\Pages;
use BackedEnum;
use Filament\Resources\Resource;
use Filament\Schemas\Schema;
use Filament\Tables\Table;
use Spatie\Activitylog\Models\Activity;
use Filament\Support\Icons\Heroicon;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Columns\BadgeColumn;
use Filament\Actions\ViewAction;
use Filament\Actions\BulkActionGroup;
use Filament\Actions\DeleteBulkAction;
use Filament\Infolists\Components\TextEntry;
use Filament\Infolists\Components\ViewEntry;
use Filament\Schemas\Components\Section;
use UnitEnum;

class ActivityLogResource extends Resource
{
    protected static ?string $model = Activity::class;

    protected static string|BackedEnum|null $navigationIcon = Heroicon::OutlinedClipboardDocumentList;

    protected static string|UnitEnum|null $navigationGroup = 'System';

    protected static ?int $navigationSort = 1;

    public static function infolist(Schema $schema): Schema
    {
        return $schema
            ->schema([
            Section::make('Activity Info')
            ->columns([
                'sm' => 2,
                'xl' => 2,
            ])
            ->schema([
                TextEntry::make('log_name')
                ->label('Log')
                ->badge()
                ->color('primary'),
                TextEntry::make('description')
                ->label('Event')
                ->wrap(),
                ViewEntry::make('subject')
                ->label('Model')
                ->view('filament.resources.activity-log.subject-entry'),
                TextEntry::make('subject_id')
                ->label('Model ID')
                ->extraAttributes(['class' => 'font-mono']),
                ViewEntry::make('causer')
                ->label('Causer')
                ->view('filament.resources.activity-log.causer-entry'),
                TextEntry::make('ip_address')
                ->label('IP Address')
                ->default('-'),
                TextEntry::make('created_at')
                ->label('Timestamp')
                ->dateTime('d M Y, H:i:s'),
            ]),

            Section::make('Perubahan Data')
            ->description('Perbandingan nilai sebelum dan sesudah perubahan')
            ->schema([
                ViewEntry::make('properties')
                ->label('')
                ->view('filament.resources.activity-log.properties-comparison')
                ->columnSpanFull(),
            ])
            ->visible(fn($record) => !empty($record->properties['old']) || !empty($record->properties['attributes'])),
        ]);
    }

    public static function form(Schema $schema): Schema
    {
        return $schema
            ->columns([
            // Read-only resource, form is not used
        ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
            BadgeColumn::make('log_name')
            ->label('Log')
            ->colors([
                'primary' => fn($state) => $state === 'default' ? true : true,
            ])
            ->sortable()
            ->searchable(),
            TextColumn::make('description')
            ->label('Event')
            ->searchable()
            ->wrap()
            ->limit(80),
            TextColumn::make('subject_type')
            ->label('Model')
            ->getStateUsing(fn($record) => class_basename($record->subject_type))
            ->searchable(),
            TextColumn::make('subject_id')
            ->label('Model ID')
            ->extraAttributes(['class' => 'font-mono'])
            ->searchable(),
            TextColumn::make('causer.name')
            ->label('Causer')
            ->default('System')
            ->wrap(),
            TextColumn::make('created_at')
            ->label('When')
            ->dateTime()
            ->sortable(),
        ])
            ->filters([
            // add filters here if you want (date range, log_name etc.)
        ])
            ->recordActions([
            ViewAction::make(),
        ])
            ->toolbarActions([
            BulkActionGroup::make([
                DeleteBulkAction::make(),
            ]),
        ]);
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
            'index' => Pages\ListActivityLogs::route('/'),
            'view' => Pages\ViewActivityLog::route('/{record}'),
        ];
    }
}