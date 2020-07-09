<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class UGPSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('usluga_gost_parcelas')->insert([
            'idGostParcela' => 1,
            'idUsluga' => 2,
            'kolicina' => 1,
        ]);
        DB::table('usluga_gost_parcelas')->insert([
            'idGostParcela' => 1,
            'idUsluga' => 1,
            'kolicina' => 2,
        ]);
        DB::table('usluga_gost_parcelas')->insert([
            'idGostParcela' => 2,
            'idUsluga' => 1,
            'kolicina' => 3,
        ]);
    }
}
