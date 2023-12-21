<?php

namespace Database\Seeders;

use Illuminate\Support\Facades\DB;
use Illuminate\Database\Seeder;

class TypeSeeder extends Seeder
{
    
    protected $types = [
        'Débito' => 0,
        'Crédito Nubank' => 1,
        'Crédito Santander' => 1,
        'Crédito Assai' => 1,
        'Boleto' => 1,
        'Carnê' => 1,
        'Dinheiro' => 0,
        'Pix' => 0,
        'Crédito (outros)' => 1,
        'Débito (outros)' => 0
    ];

    public function run()
    {
        foreach ($this->types as $type => $value) {
            DB::table('types')->insert([
                "name" => $type,
                "active_installment" => $value,
                "created_at" => now(),
                "updated_at" => now()
            ]);
        }
    }
}
