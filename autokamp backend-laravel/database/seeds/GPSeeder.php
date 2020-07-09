<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class GPSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('gost_parcelas')->insert([
            'idParcela' => 1,
            'idGost' => 1,
            'datumDolazak' => '2020-06-02',
            'datumOdlazak' => '2020-06-15',
        ]);
        DB::table('gost_parcelas')->insert([
            'idParcela' => 2,
            'idGost' => 2,
            'datumDolazak' => '2020-06-05',
            'datumOdlazak' => '2020-06-18',
        ]);
    }
}
