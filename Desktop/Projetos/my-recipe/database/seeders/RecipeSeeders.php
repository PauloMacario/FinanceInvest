<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class RecipeSeeders extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('recipes')->insert([
            [
                'category_id' => 4,
                'image_id' => 6,
                'name' => 'Carbonara',
                'ingredients' => 'Macarrão;bacon;ovos;azeite',
                'preparation_method' => 'misturar na panela;esquntar;servir',
                'extra_note' => 'servir quente',
                'estimated_time' => '00:20:00',
                'people_served' => 3,
                'tips' => null,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'category_id' => 6,
                'image_id' => 11,
                'name' => 'suco de laranja',
                'ingredients' => 'água;laranja;gelo',
                'preparation_method' => 'Espremer laranjas;adicionar água;adicionar gelo',
                'extra_note' => null,
                'estimated_time' => '00:10:00',
                'people_served' => 4,
                'tips' => null,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'category_id' => 4,
                'image_id' => 2,
                'name' => 'brigadrero',
                'ingredients' => 'Leite;chocolate',
                'preparation_method' => 'Misturar tudo no balde;',
                'extra_note' => 'servir no copo',
                'estimated_time' => '03:00:00',
                'people_served' => 5,
                'tips' => 'colocar granulado',
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
    }
}
