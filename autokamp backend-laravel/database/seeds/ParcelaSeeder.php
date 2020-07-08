<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ParcelaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('parcelas')->insert([
            'brojParcela' => 1,
            'velicinaParcela' => 70,
            'idTipParcela' => 1,
            'idOpisParcela' => 2,
            'image' => 'image/1.jpeg',
        ]);

        DB::table('parcelas')->insert([
            'brojParcela' => 2,
            'velicinaParcela' => 80,
            'idTipParcela' => 1,
            'idOpisParcela' => 3,
            'image' => 'image/2.jpeg',
        ]);

        DB::table('parcelas')->insert([
            'brojParcela' => 3,
            'velicinaParcela' => 65,
            'idTipParcela' => 2,
            'idOpisParcela' => 2,
            'image' => 'image/3.jpeg',
        ]);

        DB::table('parcelas')->insert([
            'brojParcela' => 4,
            'velicinaParcela' => 85,
            'idTipParcela' => 2,
            'idOpisParcela' => 1,
            'image' => 'image/4.jpeg',
        ]);

        DB::table('parcelas')->insert([
            'brojParcela' => 5,
            'velicinaParcela' => 70,
            'idTipParcela' => 2,
            'idOpisParcela' => 2,
            'image' => 'image/5.jpeg',
        ]);

        DB::table('parcelas')->insert([
            'brojParcela' => 6,
            'velicinaParcela' => 70,
            'idTipParcela' => 2,
            'idOpisParcela' => 2,
            'image' => 'image/6.jpeg',
        ]);

        DB::table('parcelas')->insert([
            'brojParcela' => 7,
            'velicinaParcela' => 100,
            'idTipParcela' => 2,
            'idOpisParcela' => 3,
            'image' => 'image/7.jpeg',
        ]);

        DB::table('parcelas')->insert([
            'brojParcela' => 8,
            'velicinaParcela' => 85,
            'idTipParcela' => 2,
            'idOpisParcela' => 2,
            'image' => 'image/8.jpeg',
        ]);

        DB::table('parcelas')->insert([
            'brojParcela' => 9,
            'velicinaParcela' => 80,
            'idTipParcela' => 4,
            'idOpisParcela' => 2,
            'image' => 'image/9.jpeg',
        ]);

        DB::table('parcelas')->insert([
            'brojParcela' => 10,
            'velicinaParcela' => 90,
            'idTipParcela' => 4,
            'idOpisParcela' => 1,
            'image' => 'image/10.jpeg',
        ]);

    }
       
}
