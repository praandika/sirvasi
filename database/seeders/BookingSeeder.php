<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Carbon\Carbon;

class BookingSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \App\Models\Booking::create([
            [
                'user_id' => 1,
                'guest_count' => 1,
                'room_id' => 1,
                'check_in' => Carbon::yesterday('GMT+8')->format('Y-m-d'),
                'check_out' => Carbon::now('GMT+8')->format('Y-m-d'),
                'total' => 100000,
                'booking_status' => 'success',
                'created_at' => Carbon::now('GMT+8')->format('Y-m-d H:i:s')
            ],

            [
                'user_id' => 2,
                'guest_count' => 3,
                'room_id' => 4,
                'check_in' => Carbon::yesterday('GMT+8')->format('Y-m-d'),
                'check_out' => Carbon::tomorrow('GMT+8')->format('Y-m-d'),
                'total' => 800000,
                'booking_status' => 'success',
                'created_at' => Carbon::now('GMT+8')->format('Y-m-d H:i:s')
            ],

            [
                'user_id' => 3,
                'guest_count' => 4,
                'room_id' => 5,
                'check_in' => Carbon::now('GMT+8')->format('Y-m-d'),
                'check_out' => Carbon::tomorrow('GMT+8')->format('Y-m-d'),
                'total' => 500000,
                'booking_status' => 'waiting',
                'created_at' => Carbon::now('GMT+8')->format('Y-m-d H:i:s')
            ],

            [
                'user_id' => 1,
                'guest_count' => 1,
                'room_id' => 1,
                'check_in' => Carbon::now('GMT+8')->format('Y-m-d'),
                'check_out' => Carbon::tomorrow('GMT+8')->format('Y-m-d'),
                'total' => 100000,
                'booking_status' => 'cancel',
                'created_at' => Carbon::now('GMT+8')->format('Y-m-d H:i:s')
            ],
        ]);
    }
}
