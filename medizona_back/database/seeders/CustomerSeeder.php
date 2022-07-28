<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\DB;

class CustomerSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('customer')->insert([
           'name' => 'Luke Skywalker',
           'email' => 'like@gmail.com',
           'address' => 'Tatooine'            
        ]);
        DB::table('customer')->insert([
            'name' => 'Obi Wan',
            'email' => 'obi@gmail.com',
            'address' => 'Tatooine'           
         ]);
         DB::table('customer')->insert([
            'name' => 'Anakin Skywalker',
            'email' => 'anakin@gmail.com',
            'address' => 'Tatooine'        
         ]);
    }
}
