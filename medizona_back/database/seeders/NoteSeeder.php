<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Date;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\DB;

class NoteSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('note')->insert([
            'customer_id' => 1,
            'date' => date("Y-m-d"),
            'total' => 30000
        ]);
        DB::table('note')->insert([
            'customer_id' => 2,
            'date' => date("Y-m-d"),
            'total' => 150000
        ]);
        DB::table('note')->insert([
            'customer_id' => 1,
            'date' => date("Y-m-d"),
            'total' => 150000
        ]);
    }
}
