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
                'room_name' => 'Delux',
                'room_type' => 'Double Room',
                'room_price' => 300000,
                'room_capacity' => 2,
                'bed_info' => '2 Queen Beds',
                'banner' => '1636511330_sidekix-media-WgkA3CSFrjc-unsplash.jpg',
                'featured_img' => '1636511330_nathan-oakley-7jymUnvjKDM-unsplash.jpg',
                'room_status' => 'available',
            ],

            [
                'room_name' => 'Standar',
                'room_type' => 'Standar Room',
                'room_price' => 150000,
                'room_capacity' => 2,
                'bed_info' => '2 Queen Beds',
                'banner' => '1636511375_francesca-tosolini-w1RE0lBbREo-unsplash.jpg',
                'featured_img' => '1636511375_kam-idris-nylcMEgK8EQ-unsplash.jpg',
                'room_status' => 'available',
            ],

            [
                'room_name' => 'Cheap Room',
                'room_type' => 'Single Room',
                'room_price' => 100000,
                'room_capacity' => 1,
                'bed_info' => '1 Single Bed',
                'banner' => '1636511422_roberto-nickson-tleCJiDOri0-unsplash.jpg',
                'featured_img' => '1636511422_dayana-brooke-RGCmPjqz-3w-unsplash.jpg',
                'room_status' => 'available',
            ],
        ]);
    }
}
