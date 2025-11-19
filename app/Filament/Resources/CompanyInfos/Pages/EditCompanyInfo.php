<?php

namespace App\Filament\Resources\CompanyInfos\Pages;

use App\Filament\Resources\CompanyInfos\CompanyInfoResource;
use App\Models\CompanyInfo;
use Filament\Resources\Pages\Page;
use Filament\Resources\Pages\Concerns\InteractsWithRecord;
use Filament\Forms\Concerns\InteractsWithForms;
use Filament\Forms\Contracts\HasForms;
use Filament\Actions\Action;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\SpatieMediaLibraryFileUpload;

class EditCompanyInfo extends Page implements HasForms
{
    use InteractsWithForms, InteractsWithRecord;

    protected static string $resource = CompanyInfoResource::class;

    protected static ?string $title = 'Company Information';

    public function getView(): string
    {
        return 'filament.resources.company-infos.pages.edit-company-info';
    }

    public ?array $data = [];

    public function mount(): void
    {
        $companyInfo = CompanyInfo::first();

        if (!$companyInfo) {
            $companyInfo = CompanyInfo::create([
                'website_name' => 'Asia Tiga Utama',
            ]);
        }

        // Use InteractsWithRecord to set the record
        $this->record = $companyInfo;

        $this->form->fill($companyInfo->toArray());
    }

    protected function getFormSchema(): array
    {
        return [
            TextInput::make('email')
                ->label('Email address')
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
        ];
    }

    protected function getFormModel(): \Illuminate\Database\Eloquent\Model | string | null
    {
        return $this->getRecord();
    }

    protected function getFormStatePath(): ?string
    {
        return 'data';
    }

    protected function getFormActions(): array
    {
        return [
            Action::make('save')
                ->label('Save changes')
                ->submit('save'),
        ];
    }

    public function save(): void
    {
        $data = $this->form->getState();

        $this->getRecord()->update($data);

        \Filament\Notifications\Notification::make()
            ->title('Saved successfully')
            ->success()
            ->send();
    }
}
