<?php

namespace Database\Seeders;

use App\Models\About;
use Illuminate\Database\Seeder;

class AboutsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $about = About::create([
            'description' => 'Asia Tiga Utama is a professional company dedicated to providing quality services to our clients. With years of experience in the industry, we have built a strong reputation for excellence and customer satisfaction.',
            'vision' => 'To be the leading company in our industry, recognized for innovation, quality, and customer satisfaction.',
            'mission' => 'To deliver exceptional services that exceed our clients expectations while maintaining the highest standards of integrity and professionalism.',
        ]);

        // You can add media later via Filament admin panel
        // $about->addMedia(storage_path('app/public/about-image.jpg'))->toMediaCollection('image');
    }
}
