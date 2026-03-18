<?php

namespace Database\Factories;

use App\Models\Hero;
use Illuminate\Database\Eloquent\Factories\Factory;

class HeroFactory extends Factory
{
    protected $model = Hero::class;

    public function definition(): array
    {
        return [
            'title' => fake()->sentence(3),
            'subtitle' => fake()->paragraph(),
            'button_text' => fake()->words(2, true),
        ];
    }
}
