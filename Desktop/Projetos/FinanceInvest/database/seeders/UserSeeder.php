<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
            'name' => 'Paulo Macario',
            'email' => 'paulo@gmail.com',
            'password' => bcrypt('123456'),
            "created_at" => now(),
            "updated_at" => now()
        ]);

        DB::table('users')->insert([
            'name' => 'Bianca Paula Rosa',
            'email' => 'bianca@gmail.com',
            'password' => bcrypt('123456'),
            "created_at" => now(),
            "updated_at" => now()
        ]);
    }
}
