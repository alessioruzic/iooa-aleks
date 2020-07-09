@extends('cmskontrola.controlmaster')

@section('content')
<div class="d-flex justify-content-end mb-2">
</div>
  <div class="card card-defatult">
    <div class="card-header">PREGLED REZERVIRANIH SMJEŠTAJNIH JEDINICA</div>
    @if($gostiparcela->count()>0)
    <div class="card-body">
        <table class="table">
            <thead>
                <th>PARCELA BROJ</th>
                <th>GOST</th>
                <th>DOLAZAK</th>
                <th>ODLAZAK</th>
                <th></th>
            </thead>
            <tbody>
                @foreach($gostiparcela as $gostparcela)
                    <tr>
                        <td>
                            {{ $gostparcela->parcela->brojParcela }}
                        </td>
                        <th>
                            {{ $gostparcela->gost->name }} {{ $gostparcela->gost->surname }}
                        </th>
                        <th>
                          {{ $gostparcela->datumDolazak }}
                      </th>
                      <th>
                        {{ $gostparcela->datumOdlazak }}
                      </th>
                        <th>
                        <td>
                           
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>

@else
<div class="card-header" mt-5>
    <h4 class="text-center">Nema podataka o Gostiju.</h4>
    </div>
@endif

@endsection