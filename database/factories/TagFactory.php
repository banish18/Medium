<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class TagFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
       return [
        'name' => 'Tag One',
        'description' => $this->faker->paragraph
    ];
    }
}
