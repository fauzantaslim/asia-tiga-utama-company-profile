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
            // DESCRIPTION: Menggabungkan profil perusahaan dengan daftar keahlian utama (SEO Keywords)
            'description' => 'Asia Tiga Utama adalah mitra tepercaya dalam solusi perawatan dan perbaikan mesin industri (Industrial Repair Specialist). Kami memadukan keahlian teknis mendalam dengan standar pengerjaan tinggi untuk menangani Rewinding Electro Motor AC/DC, perbaikan Generator & Transformator, serta maintenance mekanikal pada Submersible Pump dan Compressor Chiller. Fokus kami adalah mengembalikan performa aset vital Anda ke kondisi prima demi menjaga kelancaran operasional produksi.',

            // VISION: Menunjukkan ambisi menjadi pemimpin pasar (Authority)
            'vision' => 'Menjadi perusahaan jasa service dan maintenance elektromekanikal terdepan yang menjadi rujukan utama industri nasional dalam hal kualitas pengerjaan, ketepatan waktu, dan inovasi solusi teknis.',

            // MISSION: Fokus pada manfaat yang didapat klien (Client-Centric)
            'mission' => "1. Memberikan layanan perbaikan yang presisi dan tahan lama untuk meminimalkan downtime produksi klien.\n2. Menyediakan solusi teknis menyeluruh (one-stop solution) mulai dari rewinding hingga general repairing.\n3. Menjaga standar profesionalisme dan responsivitas tinggi dalam setiap penanganan masalah mesin industri.",
        ]);

        // You can add media later via Filament admin panel
        // $about->addMedia(storage_path('app/public/about-image.jpg'))->toMediaCollection('image');
    }
}
