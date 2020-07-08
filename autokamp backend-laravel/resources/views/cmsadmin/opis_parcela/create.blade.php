@extends('cmsadmin.adminmaster')
@section('content')
<div class="col-md-8">
<div class="card card-defatult">
    <div class="card-header">
        {{ isset($opis) ? 'Izmjeni OPIS' : 'Kreiraj novi OPIS'}}
    </div>
    <div class="card-body">
        <form action="{{ isset($opis) ? route('opis_parcela.update', $opis->id) : route('opis_parcela.store') }}" method="POST">
            @csrf
            @if(isset($opis))
                @method('PUT')
            @endif
            <div class="form-group">
                <label for="opis">Opis</label>
                <input type="text" id="opis" class="form-control" name="opis" value="{{ isset($opis) ? $opis->opis : ''}}">
            </div>
            @include('layouts.errors')
            <div class="form-group">
                <button class="btn btn-success">
                    {{ isset($opis) ? 'Izmjeni Opis' : 'Dodaj Opis' }}
                </button>
            </div>
        </form>
    </div>
</div>
</div>
@endsection