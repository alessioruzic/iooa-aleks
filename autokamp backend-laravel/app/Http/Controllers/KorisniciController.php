<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;

class KorisniciController extends Controller
{
    public function index()
    {
        return view('cmsadmin.korisnici.index')->with('korisnici', User::all());
    }

    public function dodajadmin($korisnik)
    {
        User::find($korisnik)->update([
            'role_id' => 1,
        ]);
        return redirect(route('korisnik.index'));
    }

    public function dodajkontrola($korisnik)
    {
        User::find($korisnik)->update([
            'role_id' => 3,
        ]);
        return redirect(route('korisnik.index'));
    }

    public function dodajgosta($korisnik)
    {
        User::find($korisnik)->update([
            'role_id' => 2,
        ]);
        return redirect(route('korisnik.index'));
    }
}
