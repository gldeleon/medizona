<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\DB;

class ItemsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('items')->insert([
            'name' => 'lightsabers',
            'sku' => Str::random(10),
            'price' => 10000
        ]);
        DB::table('items')->insert([
            'name' => 'x-wing',
            'sku' => Str::random(10),
            'price' => 150000
        ]);
        DB::table('items')->insert([
            'name' => 'caza tie',
            'sku' => Str::random(10),
            'price' => 150000
        ]);
    }
}
