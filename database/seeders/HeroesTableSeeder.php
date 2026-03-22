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
        $heroes = [
            [
                'title' => 'Welcome to Asia Tiga Utama',
                'subtitle' => 'Asia Tiga Utama adalah perusahaan yang bergerak di bidang jasa perbaikan dinamo dan electro motor dengan pengalaman bertahun-tahun di industri ini.',
                'button_text' => 'Hubungi Kami',
            ],
            [
                'title' => 'Spesialis Perbaikan Dinamo Industri',
                'subtitle' => 'Layanan rewinding dan perbaikan electro motor AC/DC dengan standar kualitas tinggi dan hasil optimal.',
                'button_text' => 'Hubungi Kami',
            ],
            [
                'title' => 'Jasa Gulung Dinamo Bogor Profesional & Bergaransi',
                'subtitle' => 'Spesialis rewinding dinamo, electro motor industri di Bogor dengan standar kualitas tinggi dan teknisi berpengalaman.',
                'button_text' => 'Hubungi Kami',
            ]
        ];

        foreach ($heroes as $heroData) {
            Hero::create($heroData);
        }

    // You can add media later via Filament admin panel
    // $hero->addMedia(storage_path('app/public/hero-bg.jpg'))->toMediaCollection('background_image');
    }
}
