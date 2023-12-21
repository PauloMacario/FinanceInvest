<?php

namespace Database\Seeders;

use Illuminate\Support\Facades\DB;
use Illuminate\Database\Seeder;

class SegmentSeeder extends Seeder
{
    protected $segments = [
        'Alimentação',
        'Saúde',
        'Lazer',
        'Estudo',
        'Pessoal',
        'Casa',
        'Carro',
        'Pet'
    ];

    public function run()
    {
        foreach ($this->segments as $segment) {
            DB::table('segments')->insert([
                "name" => $segment,
                "created_at" => now(),
                "updated_at" => now()
            ]);
        }
    }
}
