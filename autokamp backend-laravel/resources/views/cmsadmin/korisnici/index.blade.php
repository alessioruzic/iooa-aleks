@extends('cmsadmin.adminmaster')

@section('content')
<div class="d-flex justify-content-end mb-2">
<a href="{{ route('tip_parcela.create') }}" class="btn btn-success">Dodaj novi TIP</a>
</div>
  <div class="card card-defatult">
    <div class="card-header">KORISNICI APLIKACIJE</div>
    @if($korisnici->count()>0)
    <div class="card-body">
        <table class="table">
            <thead>
                <th>IME</th>
                <th>PREZIME</th>
                <th>ROLA</th>
                <th>OIB</th>
                <th></th>
            </thead>
            <tbody>
                @foreach($korisnici as $korisnik)
                    <tr>
                        <td>
                            {{ $korisnik->name }}
                        </td>
                        <th>
                            {{ $korisnik->surname }}
                        </th>
                        <th>
                            {{ $korisnik->rola->name }}
                        </th>
                        <th>
                            {{ $korisnik->oib }}
                        </th>                        
                        <td>   
                            @if($korisnik->rola->name == "admin")
                            <td>
                                <form action="{{ route('korisnik.dodajkontrola', $korisnik->id) }}" method="POST">
                                @csrf
                                    <button type="submit" class="brn btn-success btn-sm">Control</button>
                                </form>
                            </td>
                            <td>
                                <form action="{{ route('korisnik.dodajgosta', $korisnik->id) }}" method="POST">
                                @csrf
                                    <button type="submit" class="brn btn-success btn-sm">Member</button>
                                </form>
                            </td>
                            @elseif($korisnik->rola->name == "member")
                            <td>
                                <form action="{{ route('korisnik.dodajkontrola', $korisnik->id) }}" method="POST">
                                    @csrf
                                        <button type="submit" class="brn btn-success btn-sm">Control</button>
                                </form>
                            </td>
                            <td>
                                <form action="{{ route('korisnik.dodajadmin', $korisnik->id) }}" method="POST">
                                    @csrf
                                        <button type="submit" class="brn btn-success btn-sm">Admin</button>
                                </form>
                            </td>
                            @else($korisnik->rola->name == "control")
                            <td>
                                <form action="{{ route('korisnik.dodajgosta', $korisnik->id) }}" method="POST">
                                @csrf
                                    <button type="submit" class="brn btn-success btn-sm">Member</button>
                                </form>
                            </td>
                            <td>
                                <form action="{{ route('korisnik.dodajadmin', $korisnik->id) }}" method="POST">
                                    @csrf
                                        <button type="submit" class="brn btn-success btn-sm">Admin</button>
                                </form>
                            </td>
                            @endif
                        </td>      
                        
                    </tr>
                </form>
                @endforeach
            </tbody>
        </table>
   
@else
<div class="card-header" mt-5>
    <h4 class="text-center">Nema podataka o TIPOVIMA.</h4>
    <h5 class="text-center">Molimo Vas, kreirajte TIP.</h5>
    </div>
@endif

@endsection

