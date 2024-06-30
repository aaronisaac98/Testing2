<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class GuestCategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        DB::table('guest_categories')->insert([
            'name' => 'organizer',
            'description' => 'organizer staff',
            'event_id' => '1',
            'created_at' => now(),
            'created_by' => 1
        ]);
        DB::table('guest_categories')->insert([
            'name' => 'VIP',
            'description' => 'Very Important People',
            'event_id' => '1',
            'created_at' => now(),
            'created_by' => 1
        ]);
        DB::table('guest_categories')->insert([
            'name' => 'normal',
            'description' => 'normal guest',
            'event_id' => '1',
            'created_at' => now(),
            'created_by' => 1
        ]);
    }
}
