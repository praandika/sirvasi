<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Carbon\Carbon;

class FacilitySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \App\Models\Facility::insert([
            [
                'facility_name' => 'Swimming Pool',
                'facility_price' => 100000,
            ],
            [
                'facility_name' => 'Breakfast',
                'facility_price' => 50000,
            ],
            [
                'facility_name' => 'Lunch',
                'facility_price' => 50000,
            ],
            [
                'facility_name' => 'Dinner',
                'facility_price' => 80000,
            ],
            [
                'facility_name' => 'Bikecycle',
                'facility_price' => 50000,
            ],
            [
                'facility_name' => 'Motorcycle',
                'facility_price' => 100000,
            ],
        ]);
    }
}
