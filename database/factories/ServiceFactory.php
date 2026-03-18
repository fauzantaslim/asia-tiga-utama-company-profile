<?php

namespace Database\Factories;

use App\Models\Service;
use Illuminate\Database\Eloquent\Factories\Factory;

class ServiceFactory extends Factory
{
    protected $model = Service::class;

    public function definition(): array
    {
        return [
            'title' => fake()->sentence(3),
            'description' => fake()->paragraph(),
            'icon' => fake()->randomElement(['heroicon-o-cog', 'heroicon-o-star', 'heroicon-o-check', 'heroicon-o-bolt']),
            'order' => fake()->numberBetween(0, 100),
        ];
    }
}
