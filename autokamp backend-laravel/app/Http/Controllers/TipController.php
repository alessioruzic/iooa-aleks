<?php

namespace App\Http\Controllers;

use App\Tip;
use Illuminate\Http\Request;

class TipController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('cmsadmin.tip_parcela.index')->with('tipovi', Tip::all());
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('cmsadmin.tip_parcela.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request) //PODESITI create TIP REQUEST
    {
        Tip::create([
            'naziv'=>$request->naziv,
            'cijena'=>$request->cijena
        ]);

        return redirect(route('tip_parcela.index'));
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
    public function edit(Tip $tip_parcela)
    {
        return view ('cmsadmin.tip_parcela.create')->with('tip', $tip_parcela);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Tip $tip_parcela) //PODESITI UPDATE TIP REQUEST
    {
        $tip_parcela->update([
            'naziv'=>$request->naziv,
            'cijena'=>$request->cijena,
        ]);
        return redirect(route('tip_parcela.index'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Tip $tip_parcela)
    {
        $tip_parcela->delete();
        return redirect(route('tip_parcela.index'));
    }
}
