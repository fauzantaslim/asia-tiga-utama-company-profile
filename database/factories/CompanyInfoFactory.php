<?php

namespace Database\Factories;

use App\Models\CompanyInfo;
use Illuminate\Database\Eloquent\Factories\Factory;

class CompanyInfoFactory extends Factory
{
    protected $model = CompanyInfo::class;

    public function definition(): array
    {
        return [
            'email' => fake()->companyEmail(),
            'phone' => fake()->phoneNumber(),
            'address' => fake()->address(),
            'google_map_embed_link' => 'https://maps.google.com/embed?q=' . fake()->latitude() . ',' . fake()->longitude(),
            'instagram' => 'https://instagram.com/' . fake()->userName(),
            'facebook' => 'https://facebook.com/' . fake()->userName(),
            'youtube' => 'https://youtube.com/@' . fake()->userName(),
            'website_name' => fake()->company(),
            'meta_title' => fake()->sentence(4),
            'meta_description' => fake()->sentence(10),
            'meta_keywords' => implode(', ', fake()->words(5)),
        ];
    }
}
