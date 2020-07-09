<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class UslugaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('uslugas')->insert([
            'naziv' => 'Kućni ljubimac',
            'cijena' => 5,
        ]);
        DB::table('uslugas')->insert([
            'naziv' => 'Prikolica za čamac',
            'cijena' => 6,
        ]);
        DB::table('uslugas')->insert([
            'naziv' => 'Dodatni šator',
            'cijena' => 5,
        ]);
        DB::table('uslugas')->insert([
            'naziv' => 'Dodatni auto',
            'cijena' => 6,
        ]);
    }
}
