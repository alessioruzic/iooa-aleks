@extends('cmsadmin.adminmaster')
@section('content')
<div class="col-md-8">
<div class="card card-defatult">

    <div class="card-header">
        {{ isset($parcela) ? 'Izmjeni PARCELU' : 'Kreiraj novu PARCELU'}}
    </div>
    
    <div class="card-body">
    
        <form action="{{ isset($parcela) ? route('parcela.update', $parcela->id) : route('parcela.store') }}" enctype="multipart/form-data" method="POST">
            @csrf

            @if(isset($parcela))
                @method('PUT')
            @endif

            <div class="form-group">
                <label for="brojParcela">Broj Parcele</label>
                <input type="number" id="brojParcela" class="form-control" name="brojParcela" value="{{ isset($parcela) ? $parcela->brojParcela : ''}}">
            </div>

            <div class="form-group">
                <label for="velicinaParcela">Velicina</label>
                <input type="number" id="velicinaParcela" class="form-control" name="velicinaParcela" value="{{ isset($parcela) ? $parcela->velicinaParcela : ''}}">
            </div>

            <div class="form-group">
                <label for="tip">Tip</label>
                <select name="tip" id="tip" class="form-control">
                    @foreach($tipovi as $tip)
                        <option value="{{ $tip->id }}"> {{ $tip->naziv }}</option>
                    @endforeach
                </select>
            </div>

            <div class="form-group">
                <label for="opis">Opis</label>
                <select name="opis" id="opis" class="form-control">
                    @foreach($opisi as $opis)
                        <option value="{{ $opis->id }}"> {{ $opis->opis }}</option>
                    @endforeach
                </select>
            </div>

            @if(isset($parcela))
            <div class="form-group">
                <img src="/app/public/{{($parcela->image)}}" alt="" style="width:150px">
            </div>
            @endif
            <div class="form-group">
                <label for="image">Image</label>
                <input type="file" class="form-control" name="image" id="image">
            </div>
            
            @include('layouts.errors')
            
            <div class="form-group">
                <button class="btn btn-success">
                    {{ isset($parcela) ? 'Izmjeni PARCELU' : 'Dodaj PARCELU' }}
                </button>
            </div>

        </form>
    
    </div>
</div>
</div>
@endsection