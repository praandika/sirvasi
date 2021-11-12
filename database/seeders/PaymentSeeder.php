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
                'invoice' => 'Book20200901048009',
                'payment_type' => 'Account Transfer',
                'amount' => 300000,
                'remaining_amount' => 0,
                'payment_status' => 'paid',
            ],
            [
                'user_id' => 2,
                'reservation_id' => 2,
                'invoice' => 'Book20201902048009',
                'payment_type' => 'Account Transfer',
                'amount' => 300000,
                'remaining_amount' => 0,
                'payment_status' => 'paid',
            ],
            [
                'user_id' => 2,
                'reservation_id' => 3,
                'invoice' => 'Book20202802048009',
                'payment_type' => 'Account Transfer',
                'amount' => 150000,
                'remaining_amount' => 0,
                'payment_status' => 'paid',
            ],
            [
                'user_id' => 3,
                'reservation_id' => 4,
                'invoice' => 'Book20200103048009',
                'payment_type' => 'Account Transfer',
                'amount' => 150000,
                'remaining_amount' => 0,
                'payment_status' => 'paid',
            ],
            [
                'user_id' => 4,
                'reservation_id' => 5,
                'invoice' => 'Book20200303048009',
                'payment_type' => 'Account Transfer',
                'amount' => 150000,
                'remaining_amount' => 0,
                'payment_status' => 'paid',
            ],
            [
                'user_id' => 5,
                'reservation_id' => 6,
                'invoice' => 'Book20200603048009',
                'payment_type' => 'Account Transfer',
                'amount' => 300000,
                'remaining_amount' => 0,
                'payment_status' => 'paid',
            ],
            [
                'user_id' => 5,
                'reservation_id' => 7,
                'invoice' => 'Book20200604048009',
                'payment_type' => 'Account Transfer',
                'amount' => 100000,
                'remaining_amount' => 0,
                'payment_status' => 'paid',
            ],
            [
                'user_id' => 6,
                'reservation_id' => 8,
                'invoice' => 'Book20200605048009',
                'payment_type' => 'Account Transfer',
                'amount' => 100000,
                'remaining_amount' => 0,
                'payment_status' => 'paid',
            ],
            [
                'user_id' => 7,
                'reservation_id' => 9,
                'invoice' => 'Book20200606048009',
                'payment_type' => 'Account Transfer',
                'amount' => 100000,
                'remaining_amount' => 0,
                'payment_status' => 'paid',
            ],
            [
                'user_id' => 7,
                'reservation_id' => 10,
                'invoice' => 'Book20200607048009',
                'payment_type' => 'Account Transfer',
                'amount' => 100000,
                'remaining_amount' => 0,
                'payment_status' => 'paid',
            ],
            [
                'user_id' => 8,
                'reservation_id' => 11,
                'invoice' => 'Book20200608048009',
                'payment_type' => 'Account Transfer',
                'amount' => 300000,
                'remaining_amount' => 0,
                'payment_status' => 'paid',
            ],
            [
                'user_id' => 1,
                'reservation_id' => 12,
                'invoice' => 'Book20201808048009',
                'payment_type' => 'Account Transfer',
                'amount' => 300000,
                'remaining_amount' => 0,
                'payment_status' => 'paid',
            ],
            [
                'user_id' => 1,
                'reservation_id' => 13,
                'invoice' => 'Book20201809048009',
                'payment_type' => 'Account Transfer',
                'amount' => 150000,
                'remaining_amount' => 0,
                'payment_status' => 'paid',
            ],
            [
                'user_id' => 9,
                'reservation_id' => 14,
                'invoice' => 'Book20201810048009',
                'payment_type' => 'Account Transfer',
                'amount' => 100000,
                'remaining_amount' => 0,
                'payment_status' => 'paid',
            ],
            [
                'user_id' => 3,
                'reservation_id' => 15,
                'invoice' => 'Book20201811048009',
                'payment_type' => 'Account Transfer',
                'amount' => 100000,
                'remaining_amount' => 0,
                'payment_status' => 'paid',
            ],
            [
                'user_id' => 3,
                'reservation_id' => 16,
                'invoice' => 'Book20201812048009',
                'payment_type' => 'Account Transfer',
                'amount' => 100000,
                'remaining_amount' => 0,
                'payment_status' => 'paid',
            ],
            [
                'user_id' => 5,
                'reservation_id' => 17,
                'invoice' => 'Book20201814048009',
                'payment_type' => 'Account Transfer',
                'amount' => 300000,
                'remaining_amount' => 0,
                'payment_status' => 'paid',
            ],
        ]);
    }
}
