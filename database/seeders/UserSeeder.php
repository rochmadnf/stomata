<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \App\Models\User::create([
            "full_name"    => "Super Admin",
            "phone_number" => 0,
            "gender"       => 1,
            "address"      => "-",
            "lat"          => 0,
            "long"         => 0,

            "email"     => "super_admin@stomata.test",
            "password"  => bcrypt('P4$$w0rd'),
            "is_admin"  => 1,
            "is_active" => 1,
        ]);
    }
}
