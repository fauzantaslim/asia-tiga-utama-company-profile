<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ServicesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('services')->insert([
            [
                'title' => 'General Repairing',
                'description' => 'Perbaikan umum untuk berbagai jenis dinamo dan motor industri untuk memastikan kinerja optimal.',
                'icon' => '<i class="fas fa-tools"></i>',
                'order' => 1,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'title' => 'Overhaul',
                'description' => 'Perbaikan besar untuk dinamo dan motor industri yang memerlukan pemeliharaan menyeluruh untuk mengembalikan kinerja penuh.',
                'icon' => '<i class="fas fa-cogs"></i>',
                'order' => 2,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'title' => 'Rewinding',
                'description' => 'Proses gulung ulang kumparan dinamo dan motor untuk memperbaiki kerusakan akibat korsleting atau kebakar.',
                'icon' => '<i class="fas fa-sync-alt"></i>',
                'order' => 3,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'title' => 'AC / DC Motor',
                'description' => 'Perbaikan khusus untuk motor listrik AC dan DC dalam berbagai aplikasi industri.',
                'icon' => '<i class="fas fa-plug"></i>',
                'order' => 4,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'title' => 'Mechanical / Electrical',
                'description' => 'Layanan perbaikan komprehensif untuk komponen mekanikal dan elektrikal pada sistem dinamo industri.',
                'icon' => '<i class="fas fa-wrench"></i>',
                'order' => 5,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'title' => 'Transformer',
                'description' => 'Perbaikan transformator industri untuk memastikan distribusi daya yang efisien dan aman.',
                'icon' => '<i class="fas fa-bolt"></i>',
                'order' => 6,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'title' => 'Generator',
                'description' => 'Perbaikan generator industri untuk menjaga keandalan pasokan daya darurat dan utama.',
                'icon' => '<i class="fas fa-charging-station"></i>',
                'order' => 7,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'title' => 'Submersible Pump',
                'description' => 'Perbaikan pompa celup industri yang digunakan dalam aplikasi pengairan dan pengolahan air.',
                'icon' => '<i class="fas fa-tint"></i>',
                'order' => 8,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'title' => 'Compressor',
                'description' => 'Perbaikan kompresor industri untuk sistem pneumatik dan aplikasi lainnya.',
                'icon' => '<i class="fas fa-wind"></i>',
                'order' => 9,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'title' => 'Chiller',
                'description' => 'Perbaikan sistem chiller industri untuk kontrol suhu dalam proses produksi.',
                'icon' => '<i class="fas fa-temperature-low"></i>',
                'order' => 10,
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
    }
}
