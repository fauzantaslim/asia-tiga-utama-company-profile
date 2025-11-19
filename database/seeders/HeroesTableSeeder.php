<?php

namespace Database\Seeders;

use App\Models\Hero;
use Illuminate\Database\Seeder;

class HeroesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $hero = Hero::create([
            'title' => 'Welcome to Asia Tiga Utama',
            'subtitle' => 'We provide excellent services for your business needs with years of experience in the industry.',
            'button_text' => 'Get Started',
        ]);

        // You can add media later via Filament admin panel
        // $hero->addMedia(storage_path('app/public/hero-bg.jpg'))->toMediaCollection('background_image');
    }
}
