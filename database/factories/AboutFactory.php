<?php

namespace Database\Factories;

use App\Models\About;
use Illuminate\Database\Eloquent\Factories\Factory;

class AboutFactory extends Factory
{
    protected $model = About::class;

    public function definition(): array
    {
        return [
            'description' => fake()->paragraphs(3, true),
            'vision' => fake()->paragraph(),
            'mission' => fake()->paragraph(),
        ];
    }
}
