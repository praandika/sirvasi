<?php

namespace Database\Seeders;

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
            [
                'name' => 'Andika Pranayoga',
                'username' => 'andika',
                'email' => 'praandikayoga@gmail.com',
                'email_verified_at' => Carbon::now('GMT+8')->format('Y-m-d H:i:s'),
                'password' => bcrypt('12345678'),
                'phone' => '081246571421',
                'access' => 'admin',
                'avatar' => 'icon-user.png',
            ],
            [
                'name' => 'Administrator',
                'username' => 'admin',
                'email' => 'admin@gmail.com',
                'email_verified_at' => Carbon::now('GMT+8')->format('Y-m-d H:i:s'),
                'password' => bcrypt('12345678'),
                'phone' => '081081081081',
                'access' => 'admin',
                'avatar' => 'icon-user.png',
            ],
            [
                'name' => 'Pimpinan',
                'username' => 'head',
                'email' => 'head@gmail.com',
                'email_verified_at' => Carbon::now('GMT+8')->format('Y-m-d H:i:s'),
                'password' => bcrypt('12345678'),
                'phone' => '08108097889',
                'access' => 'head',
                'avatar' => 'icon-user.png',
            ],
        ]);

        $this->call([
            RoomSeeder::class,
            FacilitySeeder::class,
            MediaSeeder::class,
            RoomFacilitySeeder::class,
            PaymentSeeder::class,
            ReservationSeeder::class,
        ]);
    }
}
