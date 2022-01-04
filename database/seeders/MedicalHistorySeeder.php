<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class MedicalHistorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('medical_history')->insert([
            'name' => 'Cancer or Tumor',
            'display_order' => 1,
            'is_active' => 1,
            'created_at' => now(),
            'updated_at' => now()
        ]);
        DB::table('medical_history')->insert([
            'name' => 'High blood pressure',
            'display_order' => 2,
            'is_active' => 1,
            'created_at' => now(),
            'updated_at' => now()
        ]);
        DB::table('medical_history')->insert([
            'name' => 'High blood sugar or diabetes',
            'display_order' => 3,
            'is_active' => 1,
            'created_at' => now(),
            'updated_at' => now()
        ]);
        DB::table('medical_history')->insert([
            'name' => 'Heart, cardiac or stroke',
            'display_order' => 4,
            'is_active' => 1,
            'created_at' => now(),
            'updated_at' => now()
        ]);
        DB::table('medical_history')->insert([
            'name' => 'High stress levels, anxiety, or depression',
            'display_order' => 5,
            'is_active' => 1,
            'created_at' => now(),
            'updated_at' => now()
        ]);
        DB::table('medical_history')->insert([
            'name' => 'None of the selection applies to me',
            'display_order' => 6,
            'is_active' => 1,
            'created_at' => now(),
            'updated_at' => now()
        ]);
    }
}
