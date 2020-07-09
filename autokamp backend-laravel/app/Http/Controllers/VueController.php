<?php

namespace App\Http\Controllers;

use App\User;
use App\Usluga;
use App\Parcela;
use Carbon\Carbon;
use App\GostParcela;
use App\GostKategorija;
use App\UslugaGostParcela;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class VueController extends Controller
{
    public function pretrazivanje(Request $request){
        $parcela = Parcela::with('tip')->get();
        $gostiparcela = GostParcela::all();
        $datumPocetak = $request->datumpocetak;
        $datumKraj = $request->datumkraj;

        $slobodne_parcele = Parcela::with('gost_parcelas', 'tip', 'opis')
            ->leftJoin('gost_parcelas', 'parcelas.id', '=', 'gost_parcelas.id')
            ->where('gost_parcelas.datumDolazak', '>', $datumKraj)
            ->orWhere('gost_parcelas.datumOdlazak', '<', $datumKraj)
            ->orWhere('gost_parcelas.id', '=', null)->get();

        return response()->json([
            'parcele' => $slobodne_parcele,
            'datumpocetak' => $datumPocetak,
            'datumkraj' => $datumKraj,
        ]);
    }

    public function rezervacijaparcele(Request $request){
        $parcela = Parcela::with('tip', 'opis')->where('parcelas.id', '=', $request->id)->get();
        $usluge = Usluga::all();
        return response()->json([
            'parcela' => $parcela,
            'usluge' => $usluge,
        ]);
    }

    public function rezerviraj(Request $request){
        $gostparcela = GostParcela::create([
            'idParcela' => $request->idParcela,
            'idGost' => Auth::user()->id,
            'datumDolazak' => $request->datumDolazak,
            'datumOdlazak' => $request->datumOdlazak,
            'nositelj' => 1,
        ]);
        $usluga = UslugaGostParcela::create([

        ]);
    }  

    public function pregledrezervacija(){
        
        $auth = auth('api')->user();
        $rezervacije = GostParcela::with('gost', 'parcela')->leftJoin('users', 'gost_parcelas.id', '=', 'users.id')
        ->where('users.id', '=',  $auth)->get();

        return response()->json([
            'userid' => $auth,
            'rezervacije' => $rezervacije,
        ]);
    }  

    public function spremiGosta(Request $request){

    }  
}
