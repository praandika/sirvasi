<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class MediaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \App\Models\Media::insert([
            [
                'room_id' => 3,
                'post_img' => '1636511941_dayana-brooke-RGCmPjqz-3w-unsplash.jpg',
            ],
            [
                'room_id' => 3,
                'post_img' => '1636511941_kam-idris-nylcMEgK8EQ-unsplash.jpg',
            ],
            [
                'room_id' => 3,
                'post_img' => '1636511941_kelsey-roenau-gxtkdHecsdM-unsplash.jpg',
            ],
            [
                'room_id' => 2,
                'post_img' => '1636512014_keytion-FmtaV-cpDFQ-unsplash.jpg',
            ],
            [
                'room_id' => 2,
                'post_img' => '1636512014_nasim-keshmiri-7bF7X2RGESk-unsplash.jpg',
            ],
            [
                'room_id' => 2,
                'post_img' => '1636512014_nathan-oakley-7jymUnvjKDM-unsplash.jpg',
            ],
            [
                'room_id' => 1,
                'post_img' => '1636512055_spacejoy-kz_xZG9ufbk-unsplash.jpg',
            ],
            [
                'room_id' => 1,
                'post_img' => '1636512055_spacejoy-umAXneH4GhA-unsplash.jpg',
            ],
            [
                'room_id' => 1,
                'post_img' => '1636512055_timothy-buck-psrloDbaZc8-unsplash.jpg',
            ],
            [
                'room_id' => 1,
                'post_img' => '1636512055_marcia-bartho-Uasj0wDn6AQ-unsplash.jpg',
            ],
        ]);
    }
}
