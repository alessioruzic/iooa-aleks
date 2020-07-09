<?php

namespace App\Http\Controllers;

use App\GostKategorija;
use Illuminate\Http\Request;

class GostKategorijaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('cmsadmin.gost_kategorija.index')->with('gost_kategorije', GostKategorija::all());
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('cmsadmin.gost_kategorija.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        GostKategorija::create([
            'naziv'=>$request->naziv,
            'godina_pocetak'=>$request->godina_pocetak,
            'godina_kraj'=>$request->godina_kraj,
            'cijena'=>$request->cijena,
        ]);

        return redirect(route('gost_kategorija.index'));
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
    public function edit(GostKategorija $gost_kategorija)
    {
        return view ('cmsadmin.gost_kategorija.create')->with('gost_kategorija', $gost_kategorija);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, GostKategorija $gost_kategorija)
    {
        $gost_kategorija->update([
            'naziv'=>$request->naziv,
            'godina_pocetak'=>$request->godina_pocetak,
            'godina_kraj'=>$request->godina_kraj,
            'cijena'=>$request->cijena,
        ]);
        return redirect(route('gost_kategorija.index'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(GostKategorija $gost_kategorija)
    {
        $gost_kategorija->delete();
        return redirect(route('gost_kategorija.index'));
    }
}
