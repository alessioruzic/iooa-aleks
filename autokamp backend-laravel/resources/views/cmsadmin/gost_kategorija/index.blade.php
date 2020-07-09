@extends('cmsadmin.adminmaster')

@section('content')
<div class="d-flex justify-content-end mb-2">
    <a href="{{ route('gost_kategorija.create') }}" class="btn btn-success">Dodaj novu KATEGORIJU</a>
    </div>
      <div class="card card-defatult">
        <div class="card-header">KATEGORIJA GOSTA</div>
        @if($gost_kategorije->count()>0)
        <div class="card-body">
            <table class="table">
                <thead>
                    <th>NAZIV</th>
                    <th>POČETAK G.</th>
                    <th>KRAJ G.</th>
                    <th>CIJENA</th>
                    <th>BROJ GOSTIJU</th>
                    <th></th>
                </thead>
                <tbody>
                    @foreach($gost_kategorije as $gost_kategorija)
                        <tr>
                            <td>
                                {{ $gost_kategorija->naziv }}
                            </td>
                            <td>
                              {{ $gost_kategorija->godina_pocetak }}
                          </td>
                          <td>
                            {{ $gost_kategorija->godina_kraj }}
                        </td>
                        <td>
                          {{ $gost_kategorija->cijena }} EUR
                        </td>
                            <th>
                              {{ $gost_kategorija->gosti()->count() }}
                            </th>
                            <td>
                                <a href="{{ route('gost_kategorija.edit', $gost_kategorija->id) }}" class="btn btn-info btn-sm">Edit</a>
                                <button class="btn btn-danger btn-sm" onclick="handleDelete({{ $gost_kategorija->id }})">Delete</button>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        <div class="modal fade" id="deleteModal" tabindex="-1" role="dialog" aria-labelledby="deleteModalLabel" aria-hidden="true">
      <div class="modal-dialog" role="document">
        <form action="" method="POST" id="deleteGostKategorijaForm">
        @method('DELETE')
        @csrf
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="deleteModalLabel">Delete Kategoriju Gosta</h5>
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
        <h4 class="text-center">Nema podataka o KATEGORIJAMA GOSTIJU.</h4>
        <h5 class="text-center">Molimo Vas, kreirajte KATEGORIJU.</h5>
        </div>
    @endif
    
    @endsection
    
    @section('scripts')
        <script>
            function handleDelete(id){
                var form=document.getElementById('deleteGostKategorijaForm')
                form.action='/cmsadmin/gost_kategorija/'+id
                console.log('deleting', form)
                $('#deleteModal').modal('show')
            }
        </script>
    @endsection