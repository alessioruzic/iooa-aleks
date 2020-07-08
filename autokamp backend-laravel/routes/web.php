<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {return view('welcome');});
Auth::routes();

//ADMIN RUTE
Route::group(['middleware' => ['web','admin']], function()
{
    Route::get('/cmsadmin/index', 'HomeController@index')->name('admin');
    Route::resource('/cmsadmin/tip_parcela', 'TipController'); //resource kreira sve rute, index, create, destroy, update, show, edit, store
    Route::resource('/cmsadmin/opis_parcela', 'OpisController');
    Route::resource('/cmsadmin/gost_kategorija', 'GostKategorijaController');
    Route::resource('/cmsadmin/usluga', 'UslugaController');
    Route::resource('/cmsadmin/kazna', 'KaznaController');
    Route::resource('/cmsadmin/parcela', 'ParcelaController');

    Route::get('/cmsadmin/korisnici', 'KorisniciController@index')->name('korisnik.index');
    Route::post('/cmsadmin/korisnici/{korisnik}/admin', 'KorisniciController@dodajadmin')->name('korisnik.dodajadmin');
    Route::post('/cmsadmin/korisnici/{korisnik}/kontrola', 'KorisniciController@dodajkontrola')->name('korisnik.dodajkontrola');
    Route::post('/cmsadmin/korisnici/{korisnik}/gost', 'KorisniciController@dodajgosta')->name('korisnik.dodajgosta');
    
});

//KONTROLOR RUTE
Route::group(['middleware' => ['web','campcontrol']], function()
{
    Route::get('/cmskontrola/index', 'HomeController@indexkontrola')->name('kontrola'); //HOME KONTROLOR
    Route::resource('/cmskontrola/kaznagostparcela', 'KaznaGostParcelaController'); //KAZNJAVANJE GOSTIJU

    Route::get('/cmskontrola/pregledgostparcela', 'GostParcelaController@indexpregled')->name('pregledgostparcela.index');
    Route::get('/cmskontrola/pregledgostparcela/pregled', 'GostParcelaController@pregled')->name('pregledgostparcela.pregled');
    Route::get('/cmskontrola/pregledgostparcela/rezerviranejedinice', 'GostParcelaController@indexpregledrezerviranihjedinica')->name('rezerviranejedinice.index');
    Route::get('/cmskontrola/pregledgostparcela/rezerviranejedinice/pregled/', 'GostParcelaController@pregledrezjed')->name('rezerviranejedinice.pregled');
});

//AUTH RUTE
Route::group(['middleware' => ['web','auth']], function()
{
    Route::get('/index', function () {return view('index');});   
});

Route::get('/logout', 'Auth\LoginController@logout'); //Auth::routes() kreira samo POST metodu za logout pa je moramo sami dodati za GET

