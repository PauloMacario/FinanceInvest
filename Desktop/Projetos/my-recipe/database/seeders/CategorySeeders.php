<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CategorySeeders extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('categories')->insert([
            [
                'image_id' => 1,
                'name' => 'Prato principal',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'image_id' => 1,
                'name' => 'Salada',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'image_id' => 1,
                'name' => 'Molho',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'image_id' => 1,
                'name' => 'Sobremesa',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'image_id' => 1,
                'name' => 'Massa',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'image_id' => 1,
                'name' => 'Bebidas',
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
    }
}
