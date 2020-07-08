<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class OpisSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('opis')->insert([
            'id' => '1',
            'opis' => 'Sunce',
        ]);
        DB::table('opis')->insert([
            'id' => '2',
            'opis' => 'Poluhlad',
        ]);
        DB::table('opis')->insert([
            'id' => '3',
            'opis' => 'Hlad',
        ]);
    }
}
