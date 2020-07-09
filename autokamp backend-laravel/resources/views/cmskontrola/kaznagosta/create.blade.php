@extends('cmskontrola.controlmaster')
@section('content')
<div class="col-md-8">
<div class="card card-defatult">

    <div class="card-header">
        {{ isset($kaznagostparcela) ? 'Izmjeni PARCELU' : 'Kreiraj novu PARCELU'}}
    </div>
    
    <div class="card-body">
    
        <form action="{{ isset($kaznagostparcela) ? route('kaznagostparcela.update', $kaznagostparcela->id) : route('kaznagostparcela.store') }}" method="POST">
            @csrf

            @if(isset($kaznagostparcela))
                @method('PUT')
            @endif


            <div class="form-group">
                <label for="idKazna">Kazna</label>
                <select name="idKazna" id="idKazna" class="form-control">
                    @foreach($kazne as $kazna)
                        <option value="{{ $kazna->id }}"> {{ $kazna->naziv }}</option>
                    @endforeach
                </select>
            </div>

            <div class="form-group">
                <label for="idKontrola">Kontrolor</label>
                <select name="idKontrola" id="idKontrola" class="form-control">
                    @foreach($kontrolori as $kontrolor)
                        <option value="{{ $kontrolor->id }}">{{ $kontrolor->surname }} {{ $kontrolor->name }}</option>
                    @endforeach
                </select>
            </div>
            
            <div class="form-group">
                <label for="idGostParcela">Gost na Parceli</label>
                <select name="idGostParcela" id="idGostParcela" class="form-control">
                    @foreach($gostiparcela as $gostparcela)
                        <option value="{{ $gostparcela->id }}">{{ $gostparcela->parcela->brojParcela }}, {{ $gostparcela->gost->surname }}{{ $gostparcela->gost->name }}</option>
                    @endforeach
                </select>
            </div>
            

            @include('layouts.errors')
            
            <div class="form-group">
                <button class="btn btn-success">
                    {{ isset($kaznagostparcela) ? 'Izmjeni PARCELU' : 'Dodaj PARCELU' }}
                </button>
            </div>

        </form>
    
    </div>
</div>
</div>
@endsection