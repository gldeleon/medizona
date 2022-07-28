<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\DB;

class NoteItemsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('note_items')->insert([
            'note_id' => 1,
            'item_id' => 1,
            'quantity' => 3,
            'total' => 30000
        ]);
        DB::table('note_items')->insert([
            'note_id' => 2,
            'item_id' => 2,
            'quantity' => 1,
            'total' => 150000
        ]);
        DB::table('note_items')->insert([
            'note_id' => 3,
            'item_id' => 3,
            'quantity' => 1,
            'total' => 150000
        ]);
    }
}
