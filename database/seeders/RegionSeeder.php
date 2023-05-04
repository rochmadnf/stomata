<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class RegionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $regions = [
            base_path('database/sql/provinces.sql'),
            base_path('database/sql/cities.sql'),
            base_path('database/sql/districts.sql'),
            base_path('database/sql/sub_districts.sql'),
        ];

        foreach ($regions as $region) {
            $sql = file_get_contents($region);
            DB::unprepared($sql);
        }
    }
}
