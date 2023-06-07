<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class KeywordsTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('keywords')->delete();
        
        \DB::table('keywords')->insert(array (
            0 => 
            array (
                'id' => 1,
                'name' => 'cowboy bebop',
                'template' => NULL,
                'map' => NULL,
                'house_types' => NULL,
                'status_types' => NULL,
                'shortcode' => '[cowboy_bebop]',
                'listing_settings' => NULL,
                'sponsor_only' => NULL,
                'show_solds' => 0,
                'use_version_5' => 0,
                'active' => 1,
                'listhub' => 0,
                'created_at' => '2023-06-07 01:02:15',
                'updated_at' => '2023-06-07 01:02:15',
                'deleted_at' => NULL,
                'customer_id' => NULL,
            ),
        ));
        
        
    }
}