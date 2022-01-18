<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class LifestyleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $lifestyles = [
            'Engaged in extreme sports or aviation in the last three years',
            'Use tobacco or nicotine products',
            'Been diagnosed or treated for a dependency on alcohol or drugs',
            'Use marijuana or THC in any form',
            'Used illegal drugs',
            'Been charged with or convicted of a felony',
            'None of these selection applies to me',
        ];

        $i = 1;
        foreach ($lifestyles as $lifestyle) {
            DB::table('lifestyles')->insert([
                'name' => $lifestyle,
                'display_order' => $i,
                'is_active' => 1,
                'created_at' => now(),
                'updated_at' => now()
            ]);
            $i++;
        }
    }
}
