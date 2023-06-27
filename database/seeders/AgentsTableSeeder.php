<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class AgentsTableSeeder extends Seeder
{
    /**
     * Auto generated seed file.
     *
     * @return void
     */
    public function run()
    {
        \DB::table('agents')->delete();

        \DB::table('agents')->insert([
            0 => [
                'id' => 1,
                'published' => 0,
                'is_vetted' => 0,
                'user_confirmed_info' => 0,
                'demo' => 0,
                'display_name' => 'Phillip Madsen',
                'timezone' => null,
                'callout_text' => null,
                'biography' => null,
                'license' => null,
                'website' => 'https://bootybooty.io',
                'facebook' => null,
                'youtube' => null,
                'linkedin' => null,
                'twitter' => null,
                'instagram' => null,
                'settings' => null,
                'office' => 'over here',
                'template' => null,
                'vetting_data' => null,
                'created_at' => '2023-06-07 01:30:32',
                'updated_at' => '2023-06-07 01:30:32',
                'deleted_at' => null,
                'user_id' => 1,
            ],
        ]);
    }
}
