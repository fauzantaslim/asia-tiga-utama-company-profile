<?php

namespace Database\Seeders;

use App\Models\CompanyInfo;
use Illuminate\Database\Seeder;

class CompanyInfosTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $companyInfo = CompanyInfo::create([
            'email' => 'info@asiatigautama.com',
            'phone' => '+62 21 1234 5678',
            'address' => 'Jl. Jenderal Sudirman No. 123, Jakarta, Indonesia',
            'google_map_embed_link' => '<iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3966.277413418123!2d106.82993031476892!3d-6.229759995479412!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2e69f3a6c0c0c0c1%3A0x1234567890abcdef!2sJakarta!5e0!3m2!1sen!2sid!4v1234567890123!5m2!1sen!2sid" width="100%" height="450" style="border:0;" allowfullscreen="" loading="lazy"></iframe>',
            'instagram' => 'https://instagram.com/asiatigautama',
            'facebook' => 'https://facebook.com/asiatigautama',
            'youtube' => 'https://youtube.com/asiatigautama',
            'website_name' => 'Asia Tiga Utama',
            'meta_title' => 'Asia Tiga Utama - Professional Business Services',
            'meta_description' => 'Asia Tiga Utama provides professional business services including consulting, development, and support to help your business grow.',
            'meta_keywords' => 'business, consulting, development, support, asia tiga utama',
        ]);

        // You can add media later via Filament admin panel
        // $companyInfo->addMedia(storage_path('app/public/logo.png'))->toMediaCollection('logo_website');
    }
}
