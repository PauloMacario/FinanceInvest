<?php

namespace Database\Seeders;

use Illuminate\Support\Facades\DB;
use Illuminate\Database\Seeder;

class ShopperSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('shoppers')->insert([
            'name' => 'Paulo Macario',
            'user_id' => 1,
            "created_at" => now(),
            "updated_at" => now()
        ]);

        DB::table('shoppers')->insert([
            'name' => 'Bianca Paula Rosa',
            'user_id' => 2,
            "created_at" => now(),
            "updated_at" => now()
        ]);
    }
}
