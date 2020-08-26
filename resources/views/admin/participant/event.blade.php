@extends('admin.templates.default')
@section("title")Events @endsection

@section('content')
<div class="main-content">
    <section class="section">
        <div class="section-header">
            <h1>Event</h1>
        </div>

        <div class="section-body">

            <div class="card">
                <div class="card-header">
                    <h4><i class="fas fa-bell"></i> Event</h4>
                </div>

                <div class="card-body">
                    {{-- <form action="{{ route('admin.event.index') }}" method="GET">
                        <div class="form-group">
                            <div class="input-group mb-3">
                                @can('events.create')
                                    <div class="input-group-prepend">
                                        <a href="{{ route('admin.event.create') }}" class="btn btn-primary" style="padding-top: 10px;" title="Tambah"><i class="fa fa-plus-circle"></i> TAMBAH</a>
                                    </div>
                                @endcan
                                <input type="text" class="form-control" name="q"
                                       placeholder="cari berdasarkan judul agenda">
                                <div class="input-group-append">
                                    <button type="submit" class="btn btn-primary"><i class="fa fa-search"></i> CARI
                                    </button>
                                </div>
                            </div>
                        </div>
                    </form> --}}
                    <div class="table-responsive">
                        <table class="table table-bordered">
                            <thead>
                            <tr>
                                <th scope="col" style="text-align: center;width: 6%">NO.</th>
                                <th scope="col">JUDUL AGENDA</th>
                                <th scope="col">LOKASI</th>
                                <th scope="col">TANGGAL</th>
                                <th scope="col" style="width: 20%;text-align: center">AKSI</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach ($events as $no => $event)
                                <tr>
                                    <th scope="row" style="text-align: center">{{ ++$no + ($events->currentPage()-1) * $events->perPage() }}</th>
                                    <td>{{ $event->title }}</td>
                                    <td>{{ $event->location }}</td>
                                    <td>{{ $event->date }}</td>
                                    <td class="text-center">
                                        <a href="{{ route('admin.participant.index', $event) }}" class="btn btn-sm btn-warning" title="Participant">
                                            <i class="fas fa-users"></i>
                                        </a>
                                    </td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                        <div style="text-align: center">
                            {{$events->links("vendor.pagination.bootstrap-4")}}
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
                        url: "{{ route("admin.event.index") }}/"+id,
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
@stop