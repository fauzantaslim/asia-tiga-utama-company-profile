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
        $captions = [
            'Team Meeting',
            'Office Space',
            'Client Presentation',
            'Workshop',
        ];

        foreach ($captions as $caption) {
            GalleryImage::create([
                'caption' => $caption,
            ]);
        }

        $faker = \Faker\Factory::create('id_ID');
        for ($i = 0; $i < 16; $i++) {
            GalleryImage::create([
                'caption' => ucwords($faker->words(rand(2, 4), true)),
            ]);
        }

        // You can add media later via Filament admin panel
    }
}
