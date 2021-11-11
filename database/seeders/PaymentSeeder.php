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
                'amount' => 300000,
                'remaining_amount' => 0,
                'payment_status' => 'paid',
            ],
            [
                'user_id' => 2,
                'reservation_id' => 2,
                'payment_type' => 'Account Transfer',
                'amount' => 300000,
                'remaining_amount' => 0,
                'payment_status' => 'paid',
            ],
            [
                'user_id' => 2,
                'reservation_id' => 3,
                'payment_type' => 'Account Transfer',
                'amount' => 150000,
                'remaining_amount' => 0,
                'payment_status' => 'paid',
            ],
            [
                'user_id' => 3,
                'reservation_id' => 4,
                'payment_type' => 'Account Transfer',
                'amount' => 150000,
                'remaining_amount' => 0,
                'payment_status' => 'paid',
            ],
            [
                'user_id' => 4,
                'reservation_id' => 5,
                'payment_type' => 'Account Transfer',
                'amount' => 150000,
                'remaining_amount' => 0,
                'payment_status' => 'paid',
            ],
            [
                'user_id' => 5,
                'reservation_id' => 6,
                'payment_type' => 'Account Transfer',
                'amount' => 300000,
                'remaining_amount' => 0,
                'payment_status' => 'paid',
            ],
            [
                'user_id' => 5,
                'reservation_id' => 7,
                'payment_type' => 'Account Transfer',
                'amount' => 100000,
                'remaining_amount' => 0,
                'payment_status' => 'paid',
            ],
            [
                'user_id' => 6,
                'reservation_id' => 8,
                'payment_type' => 'Account Transfer',
                'amount' => 100000,
                'remaining_amount' => 0,
                'payment_status' => 'paid',
            ],
            [
                'user_id' => 7,
                'reservation_id' => 9,
                'payment_type' => 'Account Transfer',
                'amount' => 100000,
                'remaining_amount' => 0,
                'payment_status' => 'paid',
            ],
            [
                'user_id' => 7,
                'reservation_id' => 10,
                'payment_type' => 'Account Transfer',
                'amount' => 100000,
                'remaining_amount' => 0,
                'payment_status' => 'paid',
            ],
            [
                'user_id' => 8,
                'reservation_id' => 11,
                'payment_type' => 'Account Transfer',
                'amount' => 300000,
                'remaining_amount' => 0,
                'payment_status' => 'paid',
            ],
            [
                'user_id' => 1,
                'reservation_id' => 12,
                'payment_type' => 'Account Transfer',
                'amount' => 300000,
                'remaining_amount' => 0,
                'payment_status' => 'paid',
            ],
            [
                'user_id' => 1,
                'reservation_id' => 13,
                'payment_type' => 'Account Transfer',
                'amount' => 150000,
                'remaining_amount' => 0,
                'payment_status' => 'paid',
            ],
            [
                'user_id' => 9,
                'reservation_id' => 14,
                'payment_type' => 'Account Transfer',
                'amount' => 100000,
                'remaining_amount' => 0,
                'payment_status' => 'paid',
            ],
            [
                'user_id' => 3,
                'reservation_id' => 15,
                'payment_type' => 'Account Transfer',
                'amount' => 100000,
                'remaining_amount' => 0,
                'payment_status' => 'paid',
            ],
            [
                'user_id' => 3,
                'reservation_id' => 16,
                'payment_type' => 'Account Transfer',
                'amount' => 100000,
                'remaining_amount' => 0,
                'payment_status' => 'paid',
            ],
            [
                'user_id' => 5,
                'reservation_id' => 17,
                'payment_type' => 'Account Transfer',
                'amount' => 300000,
                'remaining_amount' => 0,
                'payment_status' => 'paid',
            ],
        ]);
    }
}
