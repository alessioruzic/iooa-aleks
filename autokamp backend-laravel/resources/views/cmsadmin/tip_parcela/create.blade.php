@extends('cmsadmin.adminmaster')
@section('content')
<div class="col-md-8">
<div class="card card-defatult">
    <div class="card-header">
        {{ isset($tip) ? 'Izmjeni TIP' : 'Kreiraj novi TIP'}}
    </div>
    <div class="card-body">
        <form action="{{ isset($tip) ? route('tip_parcela.update', $tip->id) : route('tip_parcela.store') }}" method="POST">
            @csrf
            @if(isset($tip))
                @method('PUT')
            @endif
            <div class="form-group">
                <label for="naziv">Name</label>
                <input type="text" id="naziv" class="form-control" name="naziv" value="{{ isset($tip) ? $tip->naziv : ''}}">
            </div>
            <div class="form-group">
                <label for="cijena">Cijena</label>
                <input type="number" id="cijena" class="form-control" name="cijena" value="{{ isset($tip) ? $tip->cijena : ''}}">
            </div>
            @include('layouts.errors')
            <div class="form-group">
                <button class="btn btn-success">
                    {{ isset($tip) ? 'Izmjeni TIP' : 'Dodaj TIP' }}
                </button>
            </div>
        </form>
    </div>
</div>
</div>
@endsection