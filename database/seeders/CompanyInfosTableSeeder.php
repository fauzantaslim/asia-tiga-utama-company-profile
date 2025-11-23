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
            'google_map_embed_link' => '<iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3586.699412551947!2d106.84092539999999!3d-6.5931234!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2e69c7003160f711%3A0x242c9eeea78cfbe4!2sBENGKEL%20GULUNG%20DINAMO%20ASIA%20TIGA%20UTAMA%20-%20SINAR%20SELATAN!5e1!3m2!1sid!2sid!4v1763565408627!5m2!1sid!2sid" width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>',
            'instagram' => 'https://instagram.com/asiatigautama',
            'facebook' => 'https://facebook.com/asiatigautama',
            'youtube' => 'https://youtube.com/asiatigautama',
            'website_name' => 'Asia Tiga Utama',
            'meta_title' => 'Service Dinamo Industri Bogor, Rewinding & Overhaul | CV. Asia Tiga Utama',
            'meta_description' => 'Bengkel dinamo industri terpercaya di Bogor. Spesialis rewinding & overhaul Electro Motor AC/DC, Generator, Trafo, Chiller, & Kompresor. Cepat & Bergaransi.',
            'meta_keywords' => 'service dinamo bogor, rewinding motor bogor, jasa overhaul mesin, perbaikan generator bogor, service trafo, service submersible pump, service chiller, perbaikan kompresor, bengkel dinamo terdekat, Asia Tiga Utama',
        ]);

        // You can add media later via Filament admin panel
        // $companyInfo->addMedia(storage_path('app/public/logo.png'))->toMediaCollection('logo_website');
    }
}
