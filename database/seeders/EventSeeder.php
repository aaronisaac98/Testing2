<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class EventSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //run factory for dummyevent
        // \App\Models\Event::factory(5)->create();
        DB::table('events')->insert(
            [
                'name' => 'Jamuan Raya',
                'theme' => 'Batik',
                'dateStart' => fake()->date(),
                'dateEnd' => fake()->date(),
                'timeStart' => fake()->time(),
                'timeEnd' => fake()->time(),
                'veneu' => fake()->address(),
                'maxGuest' => fake()->numberBetween(10, 1000),
                'organizer' => fake()->company(),
                'created_at' => now(),
                'created_by' => '1',
            ]
        );
        DB::table('events')->insert(
            [
                'name' => 'Seminar AI',
                'theme' => 'formal',
                'dateStart' => fake()->date(),
                'dateEnd' => fake()->date(),
                'timeStart' => fake()->time(),
                'timeEnd' => fake()->time(),
                'veneu' => fake()->address(),
                'maxGuest' => fake()->numberBetween(10, 1000),
                'organizer' => fake()->company(),
                'created_at' => now(),
                'created_by' => '1',
            ]
        );
        DB::table('events')->insert(
            [
                'name' => 'Faculty Meeting ',
                'theme' => 'formal',
                'dateStart' => fake()->date(),
                'dateEnd' => fake()->date(),
                'timeStart' => fake()->time(),
                'timeEnd' => fake()->time(),
                'veneu' => fake()->address(),
                'maxGuest' => fake()->numberBetween(10, 1000),
                'organizer' => fake()->company(),
                'created_at' => now(),
                'created_by' => '1',
            ]
        );
    }
}
