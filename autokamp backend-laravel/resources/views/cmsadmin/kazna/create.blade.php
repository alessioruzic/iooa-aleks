@extends('cmsadmin.adminmaster')
@section('content')
<div class="col-md-8">
<div class="card card-defatult">
    <div class="card-header">
        {{ isset($kazna) ? 'Izmjeni KAZNU' : 'Kreiraj novu KAZNU'}}
    </div>
    <div class="card-body">
        <form action="{{ isset($kazna) ? route('kazna.update', $kazna->id) : route('kazna.store') }}" method="POST">
            @csrf
            @if(isset($kazna))
                @method('PUT')
            @endif
            <div class="form-group">
                <label for="naziv">Name</label>
                <input type="text" id="naziv" class="form-control" name="naziv" value="{{ isset($kazna) ? $kazna->naziv : ''}}">
            </div>
            <div class="form-group">
                <label for="cijena">Cijena</label>
                <input type="number" id="cijena" class="form-control" name="cijena" value="{{ isset($kazna) ? $kazna->cijena : ''}}">
            </div>
            @include('layouts.errors')
            <div class="form-group">
                <button class="btn btn-success">
                    {{ isset($kazna) ? 'Izmjeni KAZNU' : 'Dodaj KAZNU' }}
                </button>
            </div>
        </form>
    </div>
</div>
</div>
@endsection