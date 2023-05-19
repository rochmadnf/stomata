<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
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

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        foreach (['provinces', 'cities', 'districts', 'sub_districts'] as $item) {
            Schema::dropIfExists($item);
        }
    }
};
