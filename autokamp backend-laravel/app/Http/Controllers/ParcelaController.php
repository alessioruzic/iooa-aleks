<?php

namespace App\Http\Controllers;

use App\Tip;
use App\Opis;
use App\Parcela;
use App\GostParcela;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;


class ParcelaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $parcele=Parcela::all();
        return view('cmsadmin.parcela.index', compact('parcele', 'opisi'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $tipovi=Tip::orderBy('naziv')->get();
        $opisi=Opis::orderBy('opis')->get();
        return view('cmsadmin.parcela.create', compact('tipovi', 'opisi'));

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $path = $request->file('image')->store('image');
        $parcela=Parcela::create([
            'brojParcela'=>$request->brojParcela,
            'velicinaParcela'=>$request->velicinaParcela,
            'idTipParcela'=>$request->tip,
            'idOpisParcela'=>$request->opis,
            'image'=> $path,
        ]);
        return redirect(route('parcela.index'));
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
    public function edit(Parcela $parcela)
    {
        $tipovi=Tip::orderBy('naziv')->get();
        $opisi=Opis::orderBy('opis')->get();
        return view('cmsadmin.parcela.create', compact ('parcela', 'tipovi', 'opisi'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Parcela $parcela)
    {
        $parcela->update([
            'brojParcela'=>$request->brojParcela,
            'velicinaParcela'=>$request->velicinaParcela,
            'idTipParcela'=>$request->tip,
            'idOpisParcela'=>$request->opis,
            'image'=> $request->file('image')->store('image'),
        ]);

        return redirect(route('parcela.index'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Parcela $parcela)
    {
        $parcela->delete();
        return redirect(route('parcela.index'));
    }
}
