<?php

namespace App\Filament\Resources\Abouts\Pages;

use App\Filament\Resources\Abouts\AboutResource;
use App\Models\About;
use Filament\Resources\Pages\Page;
use Filament\Resources\Pages\Concerns\InteractsWithRecord;
use Filament\Forms\Concerns\InteractsWithForms;
use Filament\Forms\Contracts\HasForms;
use Filament\Actions\Action;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\RichEditor;
use Filament\Forms\Components\SpatieMediaLibraryFileUpload;

class EditAbout extends Page implements HasForms
{
    use InteractsWithForms, InteractsWithRecord;

    protected static string $resource = AboutResource::class;

    protected static ?string $title = 'About Us';

    public function getView(): string
    {
        return 'filament.resources.abouts.pages.edit-about';
    }

    public ?array $data = [];

    public function mount(): void
    {
        $about = About::first();

        if (!$about) {
            $about = About::create([
                'description' => '',
                'vision' => '',
                'mission' => '',
            ]);
        }

        // Use InteractsWithRecord to set the record
        $this->record = $about;

        $this->form->fill($about->toArray());
    }

    protected function getFormSchema(): array
    {
        return [
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
                ->extraAttributes([
                    'style' => 'margin-top:20px'
                ])
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
