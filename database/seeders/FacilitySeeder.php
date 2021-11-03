<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class FacilitySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \App\Models\Facility::create([
            [
                'facility_name' => 'Swimming Pool',
                'facility_type' => 'Recreational',
                'facility_price' => 100000,
                'created_at' => Carbon::now('GMT+8')->format('Y-m-d H:i:s')
            ],
            [
                'facility_name' => 'Breakfast',
                'facility_type' => 'Food',
                'facility_price' => 50000,
                'created_at' => Carbon::now('GMT+8')->format('Y-m-d H:i:s')
            ],
            [
                'facility_name' => 'Lunch',
                'facility_type' => 'Food',
                'facility_price' => 50000,
                'created_at' => Carbon::now('GMT+8')->format('Y-m-d H:i:s')
            ],
            [
                'facility_name' => 'Dinner',
                'facility_type' => 'Food',
                'facility_price' => 80000,
                'created_at' => Carbon::now('GMT+8')->format('Y-m-d H:i:s')
            ],
            [
                'facility_name' => 'Bike',
                'facility_type' => 'Vehicle',
                'facility_price' => 50000,
                'created_at' => Carbon::now('GMT+8')->format('Y-m-d H:i:s')
            ],
            [
                'facility_name' => 'Motorcycle',
                'facility_type' => 'Vehicle',
                'facility_price' => 100000,
                'created_at' => Carbon::now('GMT+8')->format('Y-m-d H:i:s')
            ],
        ]);
    }
}
