<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class GroupFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'nama' => $this->faker->randomElement(["Padepokan 1", "Padepokan 2", "Padepokan 3"]),
            'kota' => $this->faker->city(),
        ];
    }
}
