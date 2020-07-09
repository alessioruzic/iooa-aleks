@extends('cmsadmin.adminmaster')

@section('content')
<div class="d-flex justify-content-end mb-2">
<a href="{{ route('usluga.create') }}" class="btn btn-success">Dodaj novu USLUGU</a>
</div>
  <div class="card card-defatult">
    <div class="card-header">USLUGE GOSTIJU</div>
    @if($usluge->count()>0)
    <div class="card-body">
        <table class="table">
            <thead>
                <th>NAZIV</th>
                <th>CIJENA</th>
                <th></th>
            </thead>
            <tbody>
                @foreach($usluge as $usluga)
                    <tr>
                        <td>
                            {{ $usluga->naziv }}
                        </td>
                        <th>
                            {{ $usluga->cijena }} EUR
                        </th>
                        <td>
                            <a href="{{ route('usluga.edit', $usluga->id) }}" class="btn btn-info btn-sm">Edit</a>
                            <button class="btn btn-danger btn-sm" onclick="handleDelete({{ $usluga->id }})">Delete</button>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    <div class="modal fade" id="deleteModal" tabindex="-1" role="dialog" aria-labelledby="deleteModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <form action="" method="POST" id="deleteUslugaForm">
    @method('DELETE')
    @csrf
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="deleteModalLabel">Delete Usluga</h5>
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
    <h4 class="text-center">Nema podataka o USLUGAMA.</h4>
    <h5 class="text-center">Molimo Vas, kreirajte USLUGU.</h5>
    </div>
@endif

@endsection

@section('scripts')
    <script>
        function handleDelete(id){
            var form=document.getElementById('deleteUslugaForm')
            form.action='/cmsadmin/usluga/'+id
            console.log('deleting', form)
            $('#deleteModal').modal('show')
        }
    </script>
@endsection