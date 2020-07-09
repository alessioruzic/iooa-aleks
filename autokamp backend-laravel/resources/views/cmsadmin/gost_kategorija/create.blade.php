@extends('cmsadmin.adminmaster')
@section('content')
<div class="col-md-8">
<div class="card card-defatult">
    <div class="card-header">
        {{ isset($gost_kategorija) ? 'Izmjeni KATEGORIJU' : 'Kreiraj novu KATEGORIJU'}}
    </div>
    <div class="card-body">
        <form action="{{ isset($gost_kategorija) ? route('gost_kategorija.update', $gost_kategorija->id) : route('gost_kategorija.store') }}" method="POST">
            @csrf
            @if(isset($gost_kategorija))
                @method('PUT')
            @endif
            <div class="form-group">
                <label for="naziv">Naziv</label>
                <input type="text" id="naziv" class="form-control" name="naziv" value="{{ isset($gost_kategorija) ? $gost_kategorija->naziv : ''}}">
            </div>
            <div class="form-group">
                <label for="godina_pocetak">Početak godina</label>
                <input type="text" id="godina_pocetak" class="form-control" name="godina_pocetak" value="{{ isset($gost_kategorija) ? $gost_kategorija->godina_pocetak : ''}}">
            </div>
            <div class="form-group">
                <label for="godina_kraj">Kraj godina</label>
                <input type="text" id="godina_kraj" class="form-control" name="godina_kraj" value="{{ isset($gost_kategorija) ? $gost_kategorija->godina_kraj : ''}}">
            </div>
            <div class="form-group">
                <label for="cijena">Cijena</label>
                <input type="text" id="cijena" class="form-control" name="cijena" value="{{ isset($gost_kategorija) ? $gost_kategorija->cijena : ''}}">
            </div>
            @include('layouts.errors')
            <div class="form-group">
                <button class="btn btn-success">
                    {{ isset($gost_kategorija) ? 'Izmjeni Kategoriju' : 'Dodaj Kategoriju' }}
                </button>
            </div>
        </form>
    </div>
</div>
</div>
@endsection