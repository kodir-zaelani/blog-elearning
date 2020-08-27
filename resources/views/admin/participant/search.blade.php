@extends('admin.templates.default')
@section('title')Participant 

@section('content')
<div class="main-content">
    <section class="section">
        <div class="section-header">
            <h1>Search</h1>
        </div>

        <div class="section-body">

            <div class="card card-primary">
                <div class="card-header">
                    <h4><i class="fas fa-image"></i> Search Participants</h4> 
                    <div class="card-header-action">
                        <a href="{{ route('admin.participant.create') }}" class="btn btn-primary"><i class="fa fa-plus-circle"></i> Add</a>
                        <a href="{{ route('admin.participant.import') }}" class="btn btn-primary">Import </a>
                        <a href="{{ route('admin.participant.generate') }}" class="btn btn-warning">Generate </a>
                      </div>
                </div>

                <div class="card-body">
                    <form action="{{ route('admin.participant.search') }}" method="GET" id="formID">
                        <div class="form-group">
                            <div class="input-group mb-3">
                                @can('participants.create')
                                <div class="input-group-prepend">
                                    <a href="#" class="btn btn-primary" style="padding-top: 10px;"><i class="fa fa-plus-circle"></i> </a>
                                </div>
                                @endcan
                                <input type="text" class="form-control" name="q" id="InputID" placeholder="search participant" autofocus>
                                <div class="input-group-append">
                                    <button type="submit" class="btn btn-primary"><i class="fa fa-search"></i> SEARCH
                                    </button>
                                </div>
                            </div>
                        </div>
                    </form>
                    
                    <div class="row">
                        <div class="col">
                            <div class="card">
                                <div class="card-header text-center">
                                @foreach ($participants as $participant)
                                    <div class="card-img  rounded-lg">
                                        <h3 class="mb-4">SELAMAT DATANG </h3>
                                        <img src="{{ ($participant->imageurl) ? $participant->imageurl : '/assets/admin/img/avatar/avatar-5.png' }}"  class=" img-thumbnail" style="max-width: 25%;">
                                    </div>
                                </div>
                                <div class="card-body">
                                    <div class="card-body text-center">
                                        <h3> <strong>{{ $participant->name }}</strong></h3>
                                        {{-- <h1>{!! QrCode::generate($participant->nik); !!}</h1> --}}
                                        <h3>SEBAGAI {{ $participant->statuspeserta }}</h3>
                                        <h3>RAPAT PIMPINAN DAERAH </h3>
                                    </div> 
                                </div>
                                @endforeach
                            </div>
                        </div>
                        
                    </div>
                   
                </div>
            </div>
        </div>

    </section>
</div>
 

<script>
    //ajax delete
    function Delete(id)
        {
            var id = id;
            var token = $("meta[name='csrf-token']").attr("content");

            swal({
                title: "APAKAH KAMU YAKIN ?",
                text: "INGIN MENGHAPUS DATA INI!",
                icon: "warning",
                buttons: [
                    'TIDAK',
                    'YA'
                ],
                dangerMode: true,
            }).then(function(isConfirm) {
                if (isConfirm) {


                    //ajax delete
                    jQuery.ajax({
                        url: "{{ route("admin.participant.index") }}/"+id,
                        data:     {
                            "id": id,
                            "_token": token
                        },
                        type: 'DELETE',
                        success: function (response) {
                            if (response.status == "success") {
                                swal({
                                    title: 'BERHASIL!',
                                    text: 'DATA BERHASIL DIHAPUS!',
                                    icon: 'success',
                                    timer: 1000,
                                    showConfirmButton: false,
                                    showCancelButton: false,
                                    buttons: false,
                                }).then(function() {
                                    location.reload();
                                });
                            }else{
                                swal({
                                    title: 'GAGAL!',
                                    text: 'DATA GAGAL DIHAPUS!',
                                    icon: 'error',
                                    timer: 1000,
                                    showConfirmButton: false,
                                    showCancelButton: false,
                                    buttons: false,
                                }).then(function() {
                                    location.reload();
                                });
                            }
                        }
                    });

                } else {
                    return true;
                }
            })
        }
</script>

@push('page-style')
<!-- Jasny Bootstrap 4 -->
<link rel="stylesheet" href="{{ asset('/assets/admin/modules/jasny-bootstrap/4.0.0/css/jasny-bootstrap.min.css')}}">
@endpush
@push('page-script')
<!-- Jasny Bootstrap 4 -->
<script src="{{ asset('/assets/admin/modules/jasny-bootstrap/4.0.0/js/jasny-bootstrap.min.js')}}"></script>
{{-- <script type="text/javascript">document.formID.inputID.focus();</script> --}}


<script type="text/javascript">

    function SetFocus () {

    var input = document.getElementById ("theFieldID");

    input.focus ();

    }

     </script>


@endpush
@stop