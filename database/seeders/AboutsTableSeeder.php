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

            // VISION: Menunjukkan ambisi menjadi pemimpin pasar (Authority) dengan format HTML
            'vision' => '
                <div class="prose max-w-none text-justify">
                    <p>Menjadi perusahaan jasa <strong>service dan maintenance elektromekanikal</strong> terdepan yang menjadi rujukan utama industri nasional. Kami berkomitmen untuk selalu menghadirkan keunggulan melalui kualitas pengerjaan terbaik, ketepatan waktu yang presisi, serta inovasi solusi teknis yang berkelanjutan bagi seluruh mitra lini industri.</p>
                </div>
            ',

            // MISSION: Fokus pada manfaat yang didapat klien (Client-Centric) dengan format HTML
            'mission' => '
                <div class="prose max-w-none text-justify">
                    <ul class="list-disc pl-5 space-y-3">
                        <li><strong>Keandalan & Presisi:</strong> Memberikan layanan perbaikan yang presisi, andal, dan tahan lama demi meminimalkan <em>downtime</em> operasional dan produksi klien.</li>
                        <li><strong>One-Stop Solution:</strong> Menyediakan layanan teknis menyeluruh dan terintegrasi, mulai dari <em>rewinding</em> motor elektrik hingga <em>general repairing</em> untuk permesinan pabrik.</li>
                        <li><strong>Inovasi Teknologi:</strong> Terus mengadopsi teknologi, metode, dan peralatan mutakhir guna meningkatkan efektivitas serta efisiensi pada setiap penanganan masalah mesin industri.</li>
                        <li><strong>Layanan Prima:</strong> Menjaga standar profesionalisme, integritas tinggi, dan responsivitas cepat tanggap untuk membangun kemitraan bisnis jangka panjang yang saling menguntungkan.</li>
                    </ul>
                </div>
            ',
        ]);

        // You can add media later via Filament admin panel
        // $about->addMedia(storage_path('app/public/about-image.jpg'))->toMediaCollection('image');
    }
}
