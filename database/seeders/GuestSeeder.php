<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class GuestSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //run factory for dummyevent
        // \App\Models\Event::factory(5)->create();
        DB::table('guests')->insert(
            [
                'event_id' => '1',
                'guest_category_id' => '1',
                'name' => 'Aaron',
                'salutations' => 'Dato',
                'guesttype' => '3',
                'created_at' => now(),
                'created_by' => '1',
            ]
        );
        DB::table('guests')->insert(
            [
                'event_id' => '1',
                'guest_category_id' => '1',
                'name' => 'Lyu',
                'salutations' => 'Mr',
                'guesttype' => '3',
                'created_at' => now(),
                'created_by' => '1',
            ]
        );
        DB::table('guests')->insert(
            [
                'event_id' => '1',
                'guest_category_id' => '1',
                'name' => 'Yang',
                'salutations' => 'Mr',
                'guesttype' => '3',
                'created_at' => now(),
                'created_by' => '1',
            ]
        );
    }
}
