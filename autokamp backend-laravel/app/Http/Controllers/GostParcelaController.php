<?php

namespace App\Http\Controllers;

use App\GostParcela;
use Illuminate\Http\Request;

class GostParcelaController extends Controller
{

    public function indexpregled()
    {
        return view('cmskontrola.pregled_gost_parcela');
    }

    public function indexpregledrezerviranihjedinica()
    {
        return view('cmskontrola.pregled_rezervirane_jedinice');
    }

    public function pregled(Request $request)
    {
        $datum = $request->datum;

        $gostiparcela = GostParcela::with('gost', 'parcela')->leftJoin('parcelas', 'parcelas.id', '=', 'gost_parcelas.idParcela')
        ->where('datumDolazak', '<=', $datum)
        ->where('datumOdlazak', '>=', $datum)->get();
        return view('cmskontrola.ispis_gost_parcela', compact('gostiparcela'));
    }

    public function pregledrezjed(Request $request)
    {
        $datum = $request->datum;

        $gostiparcela = GostParcela::with('gost', 'parcela')->leftJoin('parcelas', 'parcelas.id', '=', 'gost_parcelas.idParcela')
        ->where('datumDolazak', '=', $datum)->get();
        return view('cmskontrola.ispis_rezervirane_jedinice', compact('gostiparcela'));
    }

    public function pregledano($id)
    {
        
    }
    
}
