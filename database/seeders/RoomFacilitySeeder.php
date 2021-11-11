<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class RoomFacilitySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \App\Models\RoomFacilities::insert([
            [
                'room_id' => 3,
                'facilities_id' => 4,
            ],

            [
                'room_id' => 3,
                'facilities_id' => 5,
            ],
            [
                'room_id' => 3,
                'facilities_id' => 6,
            ],
            [
                'room_id' => 1,
                'facilities_id' => 4,
            ],

            [
                'room_id' => 1,
                'facilities_id' => 5,
            ],
            [
                'room_id' => 1,
                'facilities_id' => 6,
            ],
            [
                'room_id' => 1,
                'facilities_id' => 7,
            ],
            [
                'room_id' => 2,
                'facilities_id' => 2,
            ],
            [
                'room_id' => 2,
                'facilities_id' => 3,
            ],
            [
                'room_id' => 2,
                'facilities_id' => 4,
            ],
            [
                'room_id' => 2,
                'facilities_id' => 7,
            ],
        ]);
    }
}
