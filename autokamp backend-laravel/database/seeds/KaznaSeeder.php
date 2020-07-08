<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class KaznaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('kaznas')->insert([
            'naziv' => 'Neprijavljen ljubimac',
            'cijena' => 50,
        ]);
        DB::table('kaznas')->insert([
            'naziv' => 'Neprijavljen gost',
            'cijena' => 150,
        ]);
        DB::table('kaznas')->insert([
            'naziv' => 'Neprijavljena prikolica',
            'cijena' => 10,
        ]);
        DB::table('kaznas')->insert([
            'naziv' => 'Neprijavljen šator',
            'cijena' => 8,
        ]);
        DB::table('kaznas')->insert([
            'naziv' => 'Neprijavljen auto',
            'cijena' => 15,
        ]);
    }
}
