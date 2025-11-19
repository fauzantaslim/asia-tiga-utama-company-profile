<?php

namespace App\Filament\Resources\BlogPosts\Pages;

use App\Filament\Resources\BlogPosts\BlogPostResource;
use Filament\Resources\Pages\CreateRecord;
use Illuminate\Support\Str;

class CreateBlogPost extends CreateRecord
{
    protected static string $resource = BlogPostResource::class;

    protected function mutateFormDataBeforeCreate(array $data): array
    {
        // Kalau slug kosong, buatkan baru
        if (empty($data['slug'])) {
            $data['slug'] = Str::slug($data['title']);
        }

        return $data;
    }
}
