<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    use WithoutModelEvents;

    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // User::factory(10)->create();

        User::factory()->create([
            'name' => 'Test User',
            'email' => 'test@example.com',
            'password' => Hash::make('password'),
        ]);

        // Run all the custom seeders
        $this->call([
            HeroesTableSeeder::class,
            AboutsTableSeeder::class,
            ServicesTableSeeder::class,
            PortfoliosTableSeeder::class,
            GalleryImagesTableSeeder::class,
            BlogPostsTableSeeder::class,
            CompanyInfosTableSeeder::class,
        ]);
    }
}
