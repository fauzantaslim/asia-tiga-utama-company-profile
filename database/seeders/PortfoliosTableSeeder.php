<?php

namespace Database\Seeders;

use App\Models\Portfolio;
use Illuminate\Database\Seeder;

class PortfoliosTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $portfolios = [
            [
                'title'       => 'Overhaul Total Generator Stamford 500 kVA - Pabrik Tekstil',
                'description' => 'Pengerjaan general overhaul meliputi Rewinding Stator & Rotor dengan kawat tembaga Supreme/Essex. Proses mencakup Varnish dengan metode VPI (Vacuum Pressure Impregnation) untuk ketahanan panas maksimal, serta penggantian bearing dan balancing rotor untuk menghilangkan vibrasi.',
                'is_published' => true,
            ],
            [
                'title'       => 'Rewinding & Mechanical Repair Electro Motor DC 150 KW',
                'description' => 'Perbaikan motor penggerak utama (Main Drive) mesin Rolling Mill. Layanan mencakup bubut Commutator, penggantian Carbon Brush holder, rewinding Field & Armature Coil, serta presisi alignment shaft. Unit berhasil dikembalikan ke efisiensi operasional 100%.',
                'is_published' => true,
            ],
            [
                'title'       => 'Restorasi Submersible Pump Deep Well (Pompa Satelit) 30 HP',
                'description' => 'Penanganan pompa yang terbakar akibat "loss phase". Melakukan gulung ulang (rewinding) dengan isolasi tahan air (waterproof insulation), penggantian Mechanical Seal set baru, dan pengecekan kebocoran housing untuk memastikan unit kedap air sepenuhnya saat diturunkan kembali.',
                'is_published' => true,
            ],
            [
                'title'       => 'Service Kompresor Chiller Screw - Industri F&B',
                'description' => 'Perbaikan mekanikal pada unit Compressor Screw yang macet (jammed). Meliputi penggantian bushing, repair housing screw, dan rewinding motor hermetic. Sistem pendingin kembali normal untuk menunjang produksi makanan.',
                'is_published' => true,
            ]
        ];

        foreach ($portfolios as $portfolio) {
            Portfolio::create($portfolio);
        }

        $faker = \Faker\Factory::create('id_ID');
        for ($i = 0; $i < 16; $i++) {
            Portfolio::create([
                'title'       => 'Proyek ' . $faker->company() . ' - ' . ucwords($faker->words(rand(2, 4), true)),
                'description' => $faker->paragraph(rand(3, 5)),
                'is_published' => true,
            ]);
        }

        // You can add media later via Filament admin panel
    }
}
