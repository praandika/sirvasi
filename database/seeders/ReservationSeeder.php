<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Carbon\Carbon;

class ReservationSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \App\Models\Reservation::insert([
            [
                'book_code' => 'Book20210911048009',
                'user_id' => 1,
                'guest_count' => 1,
                'room_id' => 1,
                'check_in' => Carbon::yesterday('GMT+8')->format('Y-m-d'),
                'check_out' => Carbon::now('GMT+8')->format('Y-m-d'),
                'reservation_status' => 'success',
                'created_at' => Carbon::now('GMT+8')->format('Y-m-d H:i:s')
            ],

            [
                'book_code' => 'Book20210915048009',
                'user_id' => 2,
                'guest_count' => 3,
                'room_id' => 4,
                'check_in' => Carbon::yesterday('GMT+8')->format('Y-m-d'),
                'check_out' => Carbon::tomorrow('GMT+8')->format('Y-m-d'),
                'reservation_status' => 'success',
                'created_at' => Carbon::now('GMT+8')->format('Y-m-d H:i:s')
            ],

            [
                'book_code' => 'Book20210916048009',
                'user_id' => 3,
                'guest_count' => 4,
                'room_id' => 5,
                'check_in' => Carbon::now('GMT+8')->format('Y-m-d'),
                'check_out' => Carbon::tomorrow('GMT+8')->format('Y-m-d'),
                'reservation_status' => 'waiting',
                'created_at' => Carbon::now('GMT+8')->format('Y-m-d H:i:s')
            ],

            [
                'book_code' => 'Book20210920048009',
                'user_id' => 1,
                'guest_count' => 1,
                'room_id' => 1,
                'check_in' => Carbon::now('GMT+8')->format('Y-m-d'),
                'check_out' => Carbon::tomorrow('GMT+8')->format('Y-m-d'),
                'reservation_status' => 'cancel',
                'created_at' => Carbon::now('GMT+8')->format('Y-m-d H:i:s')
            ],
        ]);
    }
}
