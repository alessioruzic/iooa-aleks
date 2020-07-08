@extends('cmsadmin.adminmaster')

@section('content')
<div class="d-flex justify-content-end mb-2">
<a href="{{ route('kazna.create') }}" class="btn btn-success">Dodaj novu KAZNU</a>
</div>
  <div class="card card-defatult">
    <div class="card-header">KAZNE GOSTIJU</div>
    @if($kazne->count()>0)
    <div class="card-body">
        <table class="table">
            <thead>
                <th>NAZIV</th>
                <th>CIJENA</th>
                <th></th>
            </thead>
            <tbody>
                @foreach($kazne as $kazna)
                    <tr>
                        <td>
                            {{ $kazna->naziv }}
                        </td>
                        <th>
                            {{ $kazna->cijena }} EUR
                        </th>
                        <td>
                            <a href="{{ route('kazna.edit', $kazna->id) }}" class="btn btn-info btn-sm">Edit</a>
                            <button class="btn btn-danger btn-sm" onclick="handleDelete({{ $kazna->id }})">Delete</button>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    <div class="modal fade" id="deleteModal" tabindex="-1" role="dialog" aria-labelledby="deleteModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <form action="" method="POST" id="deleteKaznaForm">
    @method('DELETE')
    @csrf
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="deleteModalLabel">Delete Kazna</h5>
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
    <h4 class="text-center">Nema podataka o KAZNAMA.</h4>
    <h5 class="text-center">Molimo Vas, kreirajte KAZNU.</h5>
    </div>
@endif

@endsection

@section('scripts')
    <script>
        function handleDelete(id){
            var form=document.getElementById('deleteKaznaForm')
            form.action='/cmsadmin/kazna/'+id
            console.log('deleting', form)
            $('#deleteModal').modal('show')
        }
    </script>
@endsection