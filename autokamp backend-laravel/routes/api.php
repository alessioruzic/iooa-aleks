<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('api')->get('/user', function (Request $request) {
    return $request->user();
});


Route::get('/pretrazivanje', 'VueController@pretrazivanje')->name('vue.pretrazivanje'); //GOTOVO!! PRIKAZ SVIH PARCELA ZA ŽELJENE DATUME
Route::get('/pretrazivanje/parcela/', 'VueController@rezervacijaparcele')->name('vue.rezervacijaparcele');//ODABERI PARCELU PROZOR ZA UNJETI DODATNE USLUGE, GOSTE

Route::post('/pretrazivanje/spremiGosta', 'VueController@spremiGosta')->name('vue.spremiGosta');//GUMB ZA SPREMITI NOVOG GOSTA

Route::post('/pretrazivanje/rezerviraj', 'VueController@rezerviraj')->name('vue.rezerviraj');//GUMB ZA SPREMANJE REZERVACIJE
Route::get('/pretrazivanje/rezervacija/', 'VueController@pregledrezervacije')->name('vue.pregledrezervacije');//PODACI O REZERVACIJI

