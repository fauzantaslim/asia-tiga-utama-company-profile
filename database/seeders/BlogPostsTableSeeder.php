<?php

namespace Database\Seeders;

use App\Models\BlogPost;
use Illuminate\Database\Seeder;

class BlogPostsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Artikel 1: Edukasi Masalah (Problem Solving)
        // Target Keyword: Penyebab dinamo terbakar, Overheating electro motor
        BlogPost::create([
            'title'   => '5 Penyebab Utama Dinamo Electro Motor Cepat Panas dan Terbakar',
            'slug'    => 'penyebab-utama-dinamo-electro-motor-panas-terbakar',
            'content' => '
            <p>Kerusakan pada electro motor seringkali menjadi mimpi buruk bagi operasional pabrik. Namun, tahukah Anda bahwa sebagian besar kasus "dinamo jebol" sebenarnya bisa dicegah? Dalam investigasi teknis ini, kami mengulas penyebab paling umum kegagalan motor induksi.</p>
            <p>Mulai dari masalah <em>Single Phasing</em>, ventilasi yang buruk, hingga <em>Overloading</em> yang memaksakan kinerja mesin. Kami juga membahas mengapa kualitas kawat tembaga dan isolasi (varnish) saat proses <em>rewinding</em> sangat menentukan umur pakai dinamo Anda ke depannya.</p>
        ',
            'is_published' => true,
        ]);

        // Artikel 2: Analisis Keputusan (Cost-Benefit Analysis)
        // Target Keyword: Jasa rewinding vs beli baru, efisiensi biaya industri
        BlogPost::create([
            'title'   => 'Rewinding vs Beli Baru: Solusi Mana yang Lebih Menguntungkan Industri?',
            'slug'    => 'rewinding-vs-beli-baru-solusi-menguntungkan-industri',
            'content' => '
            <p>Saat Generator atau Submersible Pump mengalami kerusakan fatal, manajer teknik sering dihadapkan pada dilema: Melakukan <em>rewinding</em> (gulung ulang) atau investasi membeli unit baru? Jawabannya tidak selalu sederhana.</p>
            <p>Artikel ini membedah hitungan ekonomis dan teknisnya. Faktanya, proses <em>rewinding</em> yang dilakukan oleh spesialis profesional dapat mengembalikan efisiensi mesin hingga 98% dari kondisi pabrikan dengan biaya yang jauh lebih rendah. Simak analisis lengkap mengenai kapan Anda harus memperbaiki dan kapan saatnya mengganti unit.</p>
        ',
            'is_published' => true,
        ]);

        // Artikel 3: Tips Perawatan (Maintenance Guide)
        // Target Keyword: Perawatan generator, maintenance trafo, preventive maintenance
        BlogPost::create([
            'title'   => 'Tips Vital Perawatan Generator dan Transformator untuk Mencegah Downtime',
            'slug'    => 'tips-perawatan-generator-dan-transformator-mencegah-downtime',
            'content' => '
            <p>Generator (Genset) dan Transformator adalah jantung kelistrikan pabrik. Kegagalan pada komponen ini berarti terhentinya seluruh lini produksi. Jangan menunggu hingga meledak atau mati total.</p>
            <p>Kami merangkum prosedur <em>Preventive Maintenance</em> terbaik, mulai dari pengecekan vibrasi, analisis oli pada trafo, hingga pengukuran resistansi isolasi secara berkala. Pelajari bagaimana jadwal servis rutin dapat menyelamatkan perusahaan Anda dari kerugian miliaran rupiah akibat <em>unscheduled downtime</em>.</p>
        ',
            'is_published' => true,
        ]);

        // You can add media later via Filament admin panel
    }
}
