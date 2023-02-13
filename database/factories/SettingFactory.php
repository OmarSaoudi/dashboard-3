<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Setting>
 */
class SettingFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {



        return [
            'title' => fake()->word(),
            'name' => fake()->company(),
            'email' => fake()->email(),
            'address' => fake()->address() ,
            'phone' => fake()->phoneNumber(),
            'settings_images' => fake()->imageUrl($width = 640, $height = 480),
        ];
    }
}
