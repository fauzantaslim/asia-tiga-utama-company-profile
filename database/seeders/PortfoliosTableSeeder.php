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
        Portfolio::create([
            'title' => 'E-Commerce Platform',
            'description' => 'A comprehensive e-commerce solution for retail businesses with inventory management and payment processing.',
            'is_published' => true,
        ]);

        Portfolio::create([
            'title' => 'Mobile Banking App',
            'description' => 'Secure mobile banking application with biometric authentication and real-time transaction monitoring.',
            'is_published' => true,
        ]);

        Portfolio::create([
            'title' => 'Enterprise Resource Planning',
            'description' => 'Integrated ERP system for manufacturing companies to manage production, inventory, and supply chain.',
            'is_published' => true,
        ]);

        // You can add media later via Filament admin panel
    }
}
