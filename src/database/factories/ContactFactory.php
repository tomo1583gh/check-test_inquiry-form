<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Category;

class ContactFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'last_name' => $this->faker->lastName,
            'first_name' => $this->faker->firstName,
            'gender' => $this->faker->numberBetween(1, 3),
            'email' => $this->faker->safeEmail,
            'tel' => '090-' . $this->faker->numberBetween(1000, 9999) . '-' . $this->faker->numberBetween(1000, 9999),
            'address' => $this->faker->address,
            'building' => $this->faker->secondaryAddress,
            'detail' => $this->faker->realText(80),
            'category_id' => Category::inRandomOrder()->first()->id,
        ];
    }
}
