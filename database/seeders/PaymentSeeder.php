<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Carbon\Carbon;

class PaymentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \App\Models\Payment::insert([
            [
                'user_id' => 1,
                'reservation_id' => 1,
                'payment_type' => 'Account Transfer',
                'amount' => 100000,
                'remaining_amount' => 0,
                'payment_status' => 'paid',
                'created_at' => Carbon::now('GMT+8')->format('Y-m-d H:i:s')
            ],

            [
                'user_id' => 2,
                'reservation_id' => 2,
                'payment_type' => 'Cash',
                'amount' => 800000,
                'remaining_amount' => 0,
                'payment_status' => 'paid',
                'created_at' => Carbon::now('GMT+8')->format('Y-m-d H:i:s')
            ],

            [
                'user_id' => 3,
                'reservation_id' => 3,
                'payment_type' => 'Account Transfer',
                'amount' => 200000,
                'remaining_amount' => 300000,
                'payment_status' => 'paid half',
                'created_at' => Carbon::now('GMT+8')->format('Y-m-d H:i:s')
            ],

            [
                'user_id' => 1,
                'reservation_id' => 4,
                'payment_type' => 'Account Transfer',
                'amount' => 0,
                'remaining_amount' => 100000,
                'payment_status' => 'unpaid',
                'created_at' => Carbon::now('GMT+8')->format('Y-m-d H:i:s')
            ],
        ]);
    }
}
