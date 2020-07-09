@extends('cmskontrola.controlmaster')

@section('content')
<form action="{{ route('rezerviranejedinice.pregled') }}">
    
    <div class="form-group">
    <label for="datum">Datum</label>
    <input type="date" id="datum" class="form-control" name="datum" value="0000-00-00">
    </div>

    <button class="btn btn-success"> Traži
    </button>
</form>
@endsection