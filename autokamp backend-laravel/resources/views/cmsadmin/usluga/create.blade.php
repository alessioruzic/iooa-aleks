@extends('cmsadmin.adminmaster')
@section('content')
<div class="col-md-8">
<div class="card card-defatult">
    <div class="card-header">
        {{ isset($usluga) ? 'Izmjeni USLUGU' : 'Kreiraj novu USLUGU'}}
    </div>
    <div class="card-body">
        <form action="{{ isset($usluga) ? route('usluga.update', $usluga->id) : route('usluga.store') }}" method="POST">
            @csrf
            @if(isset($usluga))
                @method('PUT')
            @endif
            <div class="form-group">
                <label for="naziv">Name</label>
                <input type="text" id="naziv" class="form-control" name="naziv" value="{{ isset($usluga) ? $usluga->naziv : ''}}">
            </div>
            <div class="form-group">
                <label for="cijena">Cijena</label>
                <input type="number" id="cijena" class="form-control" name="cijena" value="{{ isset($usluga) ? $usluga->cijena : ''}}">
            </div>
            @include('layouts.errors')
            <div class="form-group">
                <button class="btn btn-success">
                    {{ isset($usluga) ? 'Izmjeni USLUGU' : 'Dodaj USLUGU' }}
                </button>
            </div>
        </form>
    </div>
</div>
</div>
@endsection