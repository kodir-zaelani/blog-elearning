@extends('admin.templates.default')
@section("title")Classroom @endsection

@section('content')
<div class="main-content">
    <section class="section">
        <div class="section-header">
            <h1>Classroom</h1>
        </div>

        <div class="section-body">

            <div class="card">
                <div class="card-header">
                    <h4><i class="fas fa-book-open"></i> Classroom</h4>
                </div>

                <div class="card-body">
                    <form action="{{ route('admin.classroom.index') }}" method="GET">
                        <div class="row">
                            @can('classrooms.create')
                            <div class="col-md-2">
                                <a href="{{ route('admin.classroom.create') }}" class="btn btn-primary" style="padding-top: 10px;"><i class="fa fa-plus-circle"></i> TAMBAH</a>
                            </div>
                            @endcan
                            <div class="col-md-2">
                                <div class="form-group">
                                    <select class="form-control select-category @error('levelclass_id') is-invalid @enderror" name="levelclass_id">
                                        <option value="">LEVEL CLASS</option>
                                        @foreach ($levelclasses as $levelclass)
                                            <option value="{{ $levelclass->id }}">{{ $levelclass->title }}</option>
                                        @endforeach
                                    </select>
                                    @error('levelclass_id')
                                    <div class="invalid-feedback" style="display: block">
                                        {{ $message }}
                                    </div>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-6">
                                        <div class="form-group">
                                            <select class="form-control select-category @error('department_id') is-invalid @enderror" name="department_id">
                                                <option value="">-- SELECT DEPARTMENT --</option>
                                                @foreach ($departments as $department)
                                                    <option value="{{ $department->id }}">{{ $department->title_id }}</option>
                                                @endforeach
                                            </select>
                                            @error('department_id')
                                            <div class="invalid-feedback" style="display: block">
                                                {{ $message }}
                                            </div>
                                            @enderror
                                        </div>

                            </div>
                            <div class="col-md-1"><button type="submit" class="btn btn-primary"><i class="fa fa-search"></i> FILTER
                            </button></div>
                            
                        </div>
                    </form>
                    
                        
                       

                    <div class="table-responsive">
                        <table class="table table-bordered">
                            <thead>
                            <tr>
                                <th scope="col" style="text-align: center;width: 6%">NO.</th>
                                <th scope="col">NAMA ROMBEL</th>
                                <th scope="col">KODE ROMBEL</th>
                                <th scope="col" style="width: 15%;text-align: center">AKSI</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach ($classrooms as $no => $classroom)
                                <tr>
                                    <th scope="row" style="text-align: center">{{ ++$no + ($classrooms->currentPage()-1) * $classrooms->perPage() }}</th>
                                    <td>{{ $classroom->levelclass->title }}-{{ $classroom->department->title_id }}-{{ $classroom->room->title }}</td>
                                    <td>{{ $classroom->slug }}</td>
                                    <td class="text-center">
                                        @can('classrooms.edit')
                                            <a href="{{ route('admin.classroom.edit', $classroom->id) }}" class="btn btn-sm btn-primary">
                                                <i class="fa fa-pencil-alt"></i>
                                            </a>
                                        @endcan

                                        @can('classrooms.delete')
                                            <button onClick="Delete(this.id)" class="btn btn-sm btn-danger" id="{{ $classroom->id }}">
                                                <i class="fa fa-trash"></i>
                                            </button>
                                        @endcan
                                    </td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                        <div style="text-align: center">
                            {{$classrooms->links("vendor.pagination.bootstrap-4")}}
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
                        url: "{{ route("admin.classroom.index") }}/"+id,
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