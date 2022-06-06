<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Str;

class CommunityFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        $name = $this->faker->text(30);
        return [
            'name' => $name,
            'user_id' => rand(1,10),
            'description' => $this->faker->text(200),
            'slug' => Str::slug($name),
        ];
    }
}
