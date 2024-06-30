<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\event>
 */
class EventFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {

        //auto generate data for dummyevent
        return [
            'name' => fake()->realText(150, 1),
            'theme' => fake()->realText(50, 1),
            'dateStart' => fake()->date(),
            'dateEnd' => fake()->date(),
            'timeStart' => fake()->time(),
            'timeEnd' => fake()->time(),
            'veneu' => fake()->address(),
            'maxGuest' => fake()->numberBetween(10, 1000),
            'organizer' => fake()->company(),
            'created_at' => now(),
            'created_by' => '1',

        ];
    }
}
