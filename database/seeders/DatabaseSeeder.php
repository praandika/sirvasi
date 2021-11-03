<?php

namespace Database\Seeders;

use App\Models\BookingDetail;
use Illuminate\Database\Seeder;
use Carbon\Carbon;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        \App\Models\User::factory(10)->create();
        \App\Models\User::insert([
            'name' => 'Andika Pranayoga',
            'username' => 'andika',
            'email' => 'praandikayoga@gmail.com',
            'email_verified_at' => Carbon::now('GMT+8')->format('Y-m-d H:i:s'),
            'password' => bcrypt('12345678'),
            'phone' => '081246571421',
            'access' => 'admin',
            'created_at' => Carbon::now('GMT+8')->format('Y-m-d H:i:s'),
        ]);

        $this->call([
            RoomSeeder::class,
            FacilitySeeder::class,
            BookingSeeder::class,
            BookingDetailSeeder::class,
            PaymentSeeder::class,
        ]);
    }
}
