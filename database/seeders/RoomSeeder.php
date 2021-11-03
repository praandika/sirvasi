<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Carbon\Carbon;

class RoomSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \App\Models\Room::insert([
            [
                'room_name' => 'Room 1',
                'room_type' => 'Single Room',
                'room_price' => 100000,
                'room_capacity' => 1,
                'bed_info' => '1 Single Bed',
                'facility' => '["TV","Bathroom","Lunch","Breakfast","Dinner"]',
                'room_status' => 'available',
                'created_at' => Carbon::now('GMT+8')->format('Y-m-d H:i:s')
            ],

            [
                'room_name' => 'Room 2',
                'room_type' => 'Twin Room',
                'room_price' => 200000,
                'room_capacity' => 2,
                'bed_info' => '2 Single Beds',
                'facility' => '["TV","Bathroom","Lunch","Breakfast","Dinner"]',
                'room_status' => 'available',
                'created_at' => Carbon::now('GMT+8')->format('Y-m-d H:i:s')
            ],

            [
                'room_name' => 'Room 3',
                'room_type' => 'Double Room',
                'room_price' => 300000,
                'room_capacity' => 2,
                'bed_info' => '1 King Beds',
                'facility' => '["TV","Bathroom","Lunch","Breakfast","Dinner"]',
                'room_status' => 'available',
                'created_at' => Carbon::now('GMT+8')->format('Y-m-d H:i:s')
            ],

            [
                'room_name' => 'Room 4',
                'room_type' => 'Triple Room',
                'room_price' => 400000,
                'room_capacity' => 3,
                'bed_info' => '3 Single Beds',
                'facility' => '["TV","Bathroom","Lunch","Breakfast","Dinner"]',
                'room_status' => 'available',
                'created_at' => Carbon::now('GMT+8')->format('Y-m-d H:i:s')
            ],

            [
                'room_name' => 'Room 5',
                'room_type' => 'Deluxe Room',
                'room_price' => 500000,
                'room_capacity' => 4,
                'bed_info' => '2 King Beds',
                'facility' => '["TV","Bathroom","Lunch","Breakfast","Dinner"]',
                'room_status' => 'occupied',
                'created_at' => Carbon::now('GMT+8')->format('Y-m-d H:i:s')
            ],

            [
                'room_name' => 'Room 6',
                'room_type' => 'Standar Room',
                'room_price' => 250000,
                'room_capacity' => 2,
                'bed_info' => '1 Queen Beds, 1 Single Bed',
                'facility' => '["TV","Bathroom","Lunch","Breakfast","Dinner"]',
                'room_status' => 'available',
                'created_at' => Carbon::now('GMT+8')->format('Y-m-d H:i:s')
            ],
        ]);
    }
}
