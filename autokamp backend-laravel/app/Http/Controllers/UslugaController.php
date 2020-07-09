<?php

namespace App\Http\Controllers;

use App\Usluga;
use Illuminate\Http\Request;

class UslugaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('cmsadmin.usluga.index')->with('usluge', Usluga::all());
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('cmsadmin.usluga.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        Usluga::create([
            'naziv'=>$request->naziv,
            'cijena'=>$request->cijena
        ]);

        return redirect(route('usluga.index'));
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
    public function edit(Usluga $usluga)
    {
        return view ('cmsadmin.usluga.create')->with('usluga', $usluga);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Usluga $usluga)
    {
        $usluga->update([
            'naziv'=>$request->naziv,
            'cijena'=>$request->cijena,
        ]);
        return redirect(route('usluga.index'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Usluga $usluga)
    {
        $usluga->delete();
        return redirect(route('usluga.index'));
    }
}
