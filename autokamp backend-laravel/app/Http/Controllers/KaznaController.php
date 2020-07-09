<?php

namespace App\Http\Controllers;

use App\Kazna;
use Illuminate\Http\Request;

class KaznaController extends Controller
{
    public function index()
    {
        return view('cmsadmin.kazna.index')->with('kazne', Kazna::all());
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('cmsadmin.kazna.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        Kazna::create([
            'naziv'=>$request->naziv,
            'cijena'=>$request->cijena
        ]);

        return redirect(route('kazna.index'));
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
    public function edit(Kazna $kazna)
    {
        return view ('cmsadmin.kazna.create')->with('kazna', $kazna);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Kazna $kazna)
    {
        $kazna->update([
            'naziv'=>$request->naziv,
            'cijena'=>$request->cijena,
        ]);
        return redirect(route('kazna.index'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Kazna $kazna)
    {
        $kazna->delete();
        return redirect(route('kazna.index'));
    }
}
