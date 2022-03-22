<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class PostFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
       return [
        'title' => $this->faker->text,
        'user_id' => 1,
        'slug' => $this->faker->slug,
        'tags' => 'DummyTag',
        'image' => json_encode(array('dummy.png')),
        'description' => $this->faker->paragraph
    ];
    }
}
