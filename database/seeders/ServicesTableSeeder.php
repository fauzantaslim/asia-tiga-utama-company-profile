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
                'title' => 'Consulting',
                'description' => 'Professional consulting services to help your business grow and succeed in the market.',
                'icon' => '<i class="fas fa-chart-line"></i>',
                'order' => 1,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'title' => 'Development',
                'description' => 'Custom software development solutions tailored to your specific business needs.',
                'icon' => '<i class="fas fa-laptop-code"></i>',
                'order' => 2,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'title' => 'Support',
                'description' => '24/7 technical support to ensure your systems run smoothly and efficiently.',
                'icon' => '<i class="fas fa-headset"></i>',
                'order' => 3,
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
    }
}
