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
            ],
            [
                'facility_name' => 'Breakfast',
            ],
            [
                'facility_name' => 'Lunch',
            ],
            [
                'facility_name' => 'Dinner',
            ],
            [
                'facility_name' => 'Bikecycle',
            ],
            [
                'facility_name' => 'Motorcycle',
            ],
            [
                'facility_name' => 'Laundry',
            ],
        ]);
    }
}
