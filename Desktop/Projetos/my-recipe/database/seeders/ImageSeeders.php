<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ImageSeeders extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $names = [
            'default', 'arroz', 'brigadeiro',
            'caarneassada', 'feijao', 'macarrao',
            ' pao', 'peixe', 'pudim',
            'salada', 'suco'
        ];

        $extension = 'jpeg';

        $type = 'RC';

        foreach ($names as $name) {
            DB::table('images')->insert([
                [
                    'type' => $type,
                    'name' => $name,
                    'extension' => $extension,
                    'path' => "images/{$type}/{$name}.{$extension}",
                    'icon' => null,
                    'created_at' => now(),
                    'updated_at' => now(),
                ]
            ]);
        }
    }
}
