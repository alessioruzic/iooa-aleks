<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class TipSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('tips')->insert([
            'naziv' => 'Classic',
            'cijena' => 27,
        ]);

        DB::table('tips')->insert([
            'naziv' => 'FreeZone',
            'cijena' => 20,
        ]);

        DB::table('tips')->insert([
            'naziv' => 'Superior',
            'cijena' => 33,
        ]);

        DB::table('tips')->insert([
            'naziv' => 'Superior-Mare',
            'cijena' => 37,
        ]);
    }
}
