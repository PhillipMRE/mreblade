<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class KeywordsTableSeeder extends Seeder
{
    /**
     * Auto generated seed file.
     *
     * @return void
     */
    public function run()
    {
        \DB::table('keywords')->delete();

        \DB::table('keywords')->insert([
            0 => [
                'id' => 1,
                'name' => 'cowboy bebop',
                'template' => null,
                'map' => null,
                'house_types' => null,
                'status_types' => null,
                'shortcode' => '[cowboy_bebop]',
                'listing_settings' => null,
                'sponsor_only' => null,
                'show_solds' => 0,
                'use_version_5' => 0,
                'active' => 1,
                'listhub' => 0,
                'created_at' => '2023-06-07 01:02:15',
                'updated_at' => '2023-06-07 01:02:15',
                'deleted_at' => null,
                'customer_id' => null,
            ],
        ]);
    }
}
