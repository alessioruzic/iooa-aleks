@extends('cmsadmin.adminmaster')

@section('content')
<div class="d-flex justify-content-end mb-2">
<a href="{{ route('tip_parcela.create') }}" class="btn btn-success">Dodaj novi TIP</a>
</div>
  <div class="card card-defatult">
    <div class="card-header">TIP PARCELA</div>
    @if($tipovi->count()>0)
    <div class="card-body">
        <table class="table">
            <thead>
                <th>NAZIV</th>
                <th>CIJENA</th>
                <th>BROJ PARCELA</th>
                <th></th>
            </thead>
            <tbody>
                @foreach($tipovi as $tip)
                    <tr>
                        <td>
                            {{ $tip->naziv }}
                        </td>
                        <th>
                            {{ $tip->cijena }} EUR
                        </th>
                        <th>
                            {{ $tip->parcelas()->count() }}
                        </th>
                        <td>
                            <a href="{{ route('tip_parcela.edit', $tip->id) }}" class="btn btn-info btn-sm">Edit</a>
                            <button class="btn btn-danger btn-sm" onclick="handleDelete({{ $tip->id }})">Delete</button>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    <div class="modal fade" id="deleteModal" tabindex="-1" role="dialog" aria-labelledby="deleteModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <form action="" method="POST" id="deleteTipForm">
    @method('DELETE')
    @csrf
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="deleteModalLabel">Delete Tip</h5>
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
    <h4 class="text-center">Nema podataka o TIPOVIMA.</h4>
    <h5 class="text-center">Molimo Vas, kreirajte TIP.</h5>
    </div>
@endif

@endsection

@section('scripts')
    <script>
        function handleDelete(id){
            var form=document.getElementById('deleteTipForm')
            form.action='/cmsadmin/tip_parcela/'+id
            console.log('deleting', form)
            $('#deleteModal').modal('show')
        }
    </script>
@endsection