<?php

namespace Database\Seeders;

use App\Models\GalleryImage;
use Illuminate\Database\Seeder;

class GalleryImagesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        GalleryImage::create([
            'caption' => 'Team Meeting',
        ]);

        GalleryImage::create([
            'caption' => 'Office Space',
        ]);

        GalleryImage::create([
            'caption' => 'Client Presentation',
        ]);

        GalleryImage::create([
            'caption' => 'Workshop',
        ]);

        // You can add media later via Filament admin panel
    }
}
