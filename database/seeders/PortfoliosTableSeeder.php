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
        // PROJECT 1: Menunjukkan kemampuan menangani mesin Pembangkit Daya (High Value)
        Portfolio::create([
            'title'       => 'Overhaul Total Generator Stamford 500 kVA - Pabrik Tekstil',
            'description' => 'Pengerjaan general overhaul meliputi Rewinding Stator & Rotor dengan kawat tembaga Supreme/Essex. Proses mencakup Varnish dengan metode VPI (Vacuum Pressure Impregnation) untuk ketahanan panas maksimal, serta penggantian bearing dan balancing rotor untuk menghilangkan vibrasi.',
            'is_published' => true,
        ]);

        // PROJECT 2: Menunjukkan spesialisasi pada Electro Motor DC (Lebih rumit dari AC)
        Portfolio::create([
            'title'       => 'Rewinding & Mechanical Repair Electro Motor DC 150 KW',
            'description' => 'Perbaikan motor penggerak utama (Main Drive) mesin Rolling Mill. Layanan mencakup bubut Commutator, penggantian Carbon Brush holder, rewinding Field & Armature Coil, serta presisi alignment shaft. Unit berhasil dikembalikan ke efisiensi operasional 100%.',
            'is_published' => true,
        ]);

        // PROJECT 3: Menunjukkan kemampuan menangani Pompa & Sistem Fluida
        Portfolio::create([
            'title'       => 'Restorasi Submersible Pump Deep Well (Pompa Satelit) 30 HP',
            'description' => 'Penanganan pompa yang terbakar akibat "loss phase". Melakukan gulung ulang (rewinding) dengan isolasi tahan air (waterproof insulation), penggantian Mechanical Seal set baru, dan pengecekan kebocoran housing untuk memastikan unit kedap air sepenuhnya saat diturunkan kembali.',
            'is_published' => true,
        ]);

        // PROJECT 4 (Tambahan): Menunjukkan kemampuan pendingin industri (Chiller)
        Portfolio::create([
            'title'       => 'Service Kompresor Chiller Screw - Industri F&B',
            'description' => 'Perbaikan mekanikal pada unit Compressor Screw yang macet (jammed). Meliputi penggantian bushing, repair housing screw, dan rewinding motor hermetic. Sistem pendingin kembali normal untuk menunjang produksi makanan.',
            'is_published' => true,
        ]);

        // You can add media later via Filament admin panel
    }
}
