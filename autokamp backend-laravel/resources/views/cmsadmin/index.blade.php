@extends('cmsadmin.adminmaster')



@section('succeslogin')
            <div class="col-md-8">
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-md-8">
                <div class="card">
                <div class="card-header">Kontrolna ploča</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    Uspješno ste se prijavili u aplikaciju kao administrator!
                </div>
            </div>
        </div>
    </div>
</div>
</div>

@endsection

           