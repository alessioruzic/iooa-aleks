<?php

namespace App\Http\Controllers;

use App\Opis;
use Illuminate\Http\Request;

class OpisController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('cmsadmin.opis_parcela.index')->with('opisi', Opis::all());
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('cmsadmin.opis_parcela.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        Opis::create([
            'opis'=>$request->opis,
        ]);

        return redirect(route('opis_parcela.index'));
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
    public function edit(Opis $opis_parcela)
    {
        return view ('cmsadmin.opis_parcela.create')->with('opis', $opis_parcela);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Opis $opis_parcela)
    {
        $opis_parcela->update([
            'opis'=>$request->opis,
        ]);
        return redirect(route('opis_parcela.index'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Opis $opis_parcela)
    {
        $opis_parcela->delete();
        return redirect(route('opis_parcela.index'));
    }
}
