<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class ProfileFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return[
        'user_id' => \App\Models\User::factory(),
        'image' => $this->faker->imageUrl(200, 200, 'people'),
        'name' => $this->faker->name(),
        'postcode' => $this->faker->postcode(),
        'address' => $this->faker->address(),
        'building' => $this->faker->secondaryAddress()
        ];
    }
}
