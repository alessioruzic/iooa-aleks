<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CijenePoGodinamaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('gost_kategorijas')->insert([
            'naziv' => 'DJECA',
            'godina_pocetak' => 1,
            'godina_kraj' => 5,
            'cijena' => 0,
        ]);
        DB::table('gost_kategorijas')->insert([
            'naziv' => 'MLADI',
            'godina_pocetak' => 6,
            'godina_kraj' => 18,
            'cijena' => 5,
        ]);
        DB::table('gost_kategorijas')->insert([
            'naziv' => 'STARIJI',
            'godina_pocetak' => 19,
            'godina_kraj' => 120,
            'cijena' => 7,
        ]);

    }
}
