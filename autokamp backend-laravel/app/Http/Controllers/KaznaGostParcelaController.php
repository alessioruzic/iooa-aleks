<?php

namespace App\Http\Controllers;

use App\User;
use App\Kazna;
use App\GostParcela;
use App\KaznaGostParcela;
use Illuminate\Http\Request;

class KaznaGostParcelaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $kaznegostparcela=KaznaGostParcela::all();
        return view('cmskontrola.kaznagosta.index', compact('kaznegostparcela'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $kazne=Kazna::orderBy('naziv')->get();
        $kontrolori=User::where('role_id', '=', 3)->get();
        //$gostiparcela=GostParcela::orderBy('id')->get();
        $gostiparcela=GostParcela::leftJoin('users', function($join) {
            $join->on('users.id', '=', 'gost_parcelas.idGost');
          })->where('role_id','=',1)->get(); 
          //Vraća popis gostiju na parcelama ako su gosti, da ne omogućimo naplatu adminu ili kontrolu

        return view('cmskontrola.kaznagosta.create', compact('kazne', 'kontrolori', 'gostiparcela'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        KaznaGostParcela::create([
            'idGostParcela'=>$request->idGostParcela,
            'idKazna'=>$request->idKazna,
            'idKontrola'=>$request->idKontrola,
        ]);

        return redirect(route('kaznagostparcela.index'));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(KaznaGostParcela $kaznagostparcela)
    {
        $kazne=Kazna::orderBy('naziv')->get();
        $kontrolori=User::where('role_id', '=', 3)->get();
        //$gostiparcela=GostParcela::orderBy('id')->get();
        $gostiparcela=GostParcela::leftJoin('users', function($join) {
            $join->on('users.id', '=', 'gost_parcelas.idGost');
          })->where('role_id','=',1)->get(); 
          //Vraća popis gostiju na parcelama ako su gosti, da ne omogućimo naplatu adminu ili kontrolu

        return view('cmskontrola.kaznagosta.create', compact('kazne', 'kontrolori', 'gostiparcela', 'kaznagostparcela'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, KaznaGostParcela $kaznagostparcela)
    {
        $kaznagostparcela->update([
            'idGostParcela'=>$request->idGostParcela,
            'idKazna'=>$request->idKazna,
            'idKontrola'=>$request->idKontrola,
        ]);

        return redirect(route('kaznagostparcela.index'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(KaznaGostParcela $kaznagostparcela)
    {
        $kaznagostparcela->delete();
        return redirect(route('kaznagostparcela.index'));
    }
}
