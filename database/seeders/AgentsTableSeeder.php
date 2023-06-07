<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class AgentsTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('agents')->delete();
        
        \DB::table('agents')->insert(array (
            0 => 
            array (
                'id' => 1,
                'published' => 0,
                'is_vetted' => 0,
                'user_confirmed_info' => 0,
                'demo' => 0,
                'display_name' => 'Phillip Madsen',
                'timezone' => NULL,
                'call_line' => NULL,
                'biography' => NULL,
                'license' => NULL,
                'website' => 'https://bootybooty.io',
                'facebook' => NULL,
                'youtube' => NULL,
                'linkedin' => NULL,
                'twitter' => NULL,
                'instagram' => NULL,
                'settings' => NULL,
                'office' => 'over here',
                'template' => NULL,
                'vetting_data' => NULL,
                'created_at' => '2023-06-07 01:30:32',
                'updated_at' => '2023-06-07 01:30:32',
                'deleted_at' => NULL,
                'user_id' => 1,
            ),
        ));
        
        
    }
}