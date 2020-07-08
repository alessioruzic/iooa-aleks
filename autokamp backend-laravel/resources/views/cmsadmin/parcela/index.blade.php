@extends('cmsadmin.adminmaster')

@section('content')
<div class="d-flex justify-content-end mb-2">
<a href="{{ route('parcela.create') }}" class="btn btn-success">Dodaj novu PARCELU</a>
</div>
  <div class="card card-defatult">
    <div class="card-header">PARCELE</div>
    @if($parcele->count()>0)
    <div class="card-body">
        <table class="table">
            <thead>
                <th>BROJ</th>
                <th>VELICINA</th>
                <th>TIP</th>
                <th>OPIS</th>
                <th>SLIKA</th>
                <th></th>
            </thead>
            <tbody>
                @foreach($parcele as $parcela)
                    <tr>
                        <td>
                            {{ $parcela->brojParcela }}
                        </td>
                        <th>
                            {{ $parcela->velicinaParcela }}
                        </th>
                        <th>
                            {{ $parcela->tip->naziv }}, {{ $parcela->tip->cijena }} EUR
                        </th>
                        <th>
                            {{ $parcela->opis->opis }}
                        </th>
                        <th>
                            <img src="/app/public/{{ ($parcela->image) }}" width=100px height=60px alt="">
                        </th>
                        <td>
                            <a href="{{ route('parcela.edit', $parcela->id) }}" class="btn btn-info btn-sm">Edit</a>
                            <button class="btn btn-danger btn-sm" onclick="handleDelete({{ $parcela->id }})">Delete</button>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    <div class="modal fade" id="deleteModal" tabindex="-1" role="dialog" aria-labelledby="deleteModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <form action="" method="POST" id="deleteParcelaForm">
    @method('DELETE')
    @csrf
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="deleteModalLabel">Delete Parcela</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
      <p class="text-center text-bold">Želite li stvarno izbrisati podatak?</p>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Ne, idi natrag.</button>
        <button type="submit" class="btn btn-danger">Da, izbriši.</button>
      </div>
    </div>
    </form>
  </div>
</div>
    </div>
</div>
@else
<div class="card-header" mt-5>
    <h4 class="text-center">Nema podataka o PARCELAMA.</h4>
    <h5 class="text-center">Molimo Vas, kreirajte PARCELU.</h5>
    </div>
@endif

@endsection

@section('scripts')
    <script>
        function handleDelete(id){
            var form=document.getElementById('deleteParcelaForm')
            form.action='/cmsadmin/parcela/'+id
            console.log('deleting', form)
            $('#deleteModal').modal('show')
        }
    </script>
@endsection