@extends('admin.templates.default')
@section("title")Type Course @endsection

@section('content')
<div class="main-content">
    <section class="section">
        <div class="section-header">
            <h1>Type Course</h1>
        </div>

        <div class="section-body">

            <div class="card">
                <div class="card-header">
                    <h4><i class="fas fa-folder"></i> Type Course</h4>
                </div>

                <div class="card-body">
                    <form action="{{ route('admin.typecourse.index') }}" method="GET">
                        <div class="form-group">
                            <div class="input-group mb-3">
                                @can('typecourses.create')
                                    <div class="input-group-prepend">
                                        <a href="{{ route('admin.typecourse.create') }}" class="btn btn-primary" style="padding-top: 10px;"><i class="fa fa-plus-circle"></i> TAMBAH</a>
                                    </div>
                                @endcan
                                <input type="text" class="form-control" name="q"
                                       placeholder="cari berdasarkan type course">
                                <div class="input-group-append">
                                    <button type="submit" class="btn btn-primary"><i class="fa fa-search"></i> CARI
                                    </button>
                                </div>
                            </div>
                        </div>
                    </form>
                    <div class="table-responsive">
                        https://www.youtube.com/watch?v=34mBpaxWCpU
                        <table class="table table-bordered">
                            <thead>
                            <tr>
                                <th scope="col" style="text-align: center;width: 6%">NO.</th>
                                <th scope="col">NAMA KATEGORI</th>
                                <th scope="col">QR Code</th>
                                <th scope="col" style="width: 15%;text-align: center">AKSI</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach ($typecourses as $no => $typecourse)
                                <tr>
                                    <th scope="row" style="text-align: center">{{ ++$no + ($typecourses->currentPage()-1) * $typecourses->perPage() }}</th>
                                    <td>
                                        {{ $typecourse->title_id }} <br/>
                                        <small><em>{{ $typecourse->title_en }}</em></small>
                                    </td>
                                    <td>{!! QrCode::generate($typecourse->title_id); !!}</td>
                                    <td class="text-center">
                                        @can('typecourses.edit')
                                            <a href="{{ route('admin.typecourse.edit', $typecourse->id) }}" class="btn btn-sm btn-primary">
                                                <i class="fa fa-pencil-alt"></i>
                                            </a>
                                        @endcan
                                        
                                        @can('typecourses.delete')
                                            <button onClick="Delete(this.id)" class="btn btn-sm btn-danger" id="{{ $typecourse->id }}">
                                                <i class="fa fa-trash"></i>
                                            </button>  
                                        @endcan
                                    </td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                        <div style="text-align: center">
                            {{$typecourses->links("vendor.pagination.bootstrap-4")}}
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
                        url: "{{ route("admin.typecourse.index") }}/"+id,
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