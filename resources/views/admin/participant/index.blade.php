@extends('admin.templates.default')
@section('title')Participant 

@section('content')
<div class="main-content">
    <section class="section">
        <div class="section-header">
            <h1>Participant</h1>
        </div>

        <div class="section-body">

            <div class="card">
                <div class="card-header">
                    <h4><i class="fas fa-image"></i> Participants</h4>
                </div>

                <div class="card-body">
                    <form action="{{ route('admin.participant.index') }}" method="GET">
                        <div class="form-group">
                            <div class="input-group mb-3">
                                @can('participants.create')
                                <div class="input-group-prepend">
                                    <a href="{{ route('admin.participant.create') }}" class="btn btn-primary" style="padding-top: 10px;"><i class="fa fa-plus-circle"></i> Add</a>
                                </div>
                                @endcan
                                <input type="text" class="form-control" name="q"
                                       placeholder="search participant">
                                <div class="input-group-append">
                                    <button type="submit" class="btn btn-primary"><i class="fa fa-search"></i> SEARCH
                                    </button>
                                </div>
                            </div>
                        </div>
                    </form>
                    <div class="table-responsive">
                        <table class="table table-bordered">
                            <thead>
                            <tr>
                                <th scope="col" style="text-align: center;width: 6%">NO.</th>
                                <th scope="col">NAMA</th>
                                <th scope="col">NIK</th>
                                <th scope="col">EVENT</th>
                                <th scope="col" style="width: 15%;text-align: center">AKSI</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach ($participants as $no => $participant)
                                <tr>
                                    <th scope="row" style="text-align: center">{{ ++$no + ($participants->currentPage()-1) * $participants->perPage() }}</th>
                                    {{-- <td><img src="{{ Storage::url('public/photos/'.$participant->image) }}" style="width: 150px"></td> --}}
                                    <td>{{ $participant->name }} </td>
                                    <td>{{ $participant->nik }}</td>
                                    <td>{{ $participant->event->title }}</td>
                                    <td class="text-center">
                                        @can('participants.edit')
                                            <a href="{{ route('admin.participant.edit', $participant->id) }}" class="btn btn-sm btn-primary" title="Edit">
                                                <i class="fa fa-pencil-alt"></i>
                                            </a>
                                        @endcan

                                        @can('participants.delete')
                                            <button onClick="Delete(this.id)" class="btn btn-sm btn-danger" id="{{ $participant->id }}">
                                                <i class="fa fa-trash"></i>
                                            </button>
                                        @endcan
                                    </td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                        <div style="text-align: center">
                            {{$participants->links("vendor.pagination.bootstrap-4")}}
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

@endpush
@stop