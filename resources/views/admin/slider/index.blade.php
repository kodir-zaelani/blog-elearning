@extends('admin.templates.default')
@section("title")Sliders @endsection

@section('content')
<div class="main-content">
    <section class="section">
        <div class="section-header">
            <h1>Slider</h1>
        </div>

        <div class="section-body">

            @can('sliders.create')
                <div class="card">
                    <div class="card-header">
                        <h4><i class="fas fa-laptop"></i> Upload Slider</h4>
                    </div>

                    <div class="card-body">

                        <form action="{{ route('admin.slider.store') }}" method="POST" enctype="multipart/form-data">
                            @csrf

                            <div class="form-group">
                                <label>JUDUL</label>
                                <input type="text" name="title" value="{{ old('title') }}" placeholder="Masukkan Judul Agenda" class="form-control @error('title') is-invalid @enderror">

                                @error('title')
                                <div class="invalid-feedback" style="display: block">
                                    {{ $message }}
                                </div>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label>Link</label>
                                <input type="text" name="link" value="{{ old('link') }}" placeholder="Masukkan link" class="form-control @error('link') is-invalid @enderror">

                                @error('link')
                                <div class="invalid-feedback" style="display: block">
                                    {{ $message }}
                                </div>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label>Thumbnail</label> <br />

                                <div class="fileinput fileinput-new text-center" data-provides="fileinput">
                                    <div class="fileinput-new img-thumbnail" style="width: 300px;">
                                      <img src="{{ asset('/assets/admin/img/no_image.png') }}">
                                    </div>
                                    <div class="fileinput-preview fileinput-exists img-thumbnail" style="max-width: 300px;"></div>
                                    <div>
                                      <span class="btn btn-outline-secondary btn-file"><span class="fileinput-new">Select image</span><span class="fileinput-exists">Change</span>
                                      <input type="file" class="@error('image') is-invalid @enderror" name="image" value="{{ old('image') }}"></span>
                                      <a href="#" class="btn btn-outline-secondary fileinput-exists" data-dismiss="fileinput">Remove</a>
                                    </div>
                                </div>
                                @error('image')
                                <div class="invalid-feedback" style="display: block">
                                    {{ $message }}
                                </div>
                                @enderror
                            </div>
                            
                            <button class="btn btn-primary mr-1 btn-submit" type="submit"><i class="fa fa-upload"></i> UPLOAD</button>
                            <button class="btn btn-warning btn-reset" type="reset"><i class="fa fa-redo"></i> RESET</button>

                        </form>

                    </div>
                </div>
            @endcan

            <div class="card">
                <div class="card-header">
                    <h4><i class="fas fa-laptop"></i> Slider</h4>
                </div>

                <div class="card-body">
                    
                    <div class="table-responsive">
                        <table class="table table-bordered">
                            <thead>
                            <tr>
                                <th scope="col" style="text-align: center;width: 6%">NO.</th>
                                <th scope="col">FOTO</th>
                                <th scope="col">STATUS</th>
                                <th scope="col" style="width: 15%;text-align: center">AKSI</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach ($sliders as $no => $slider)
                                <tr>
                                    <th scope="row" style="text-align: center">{{ ++$no + ($sliders->currentPage()-1) * $sliders->perPage() }}</th>
                                    {{-- <td class="text-center"><img src="{{ Storage::url('public/sliders/'.$slider->image) }}" style="width: 300px"></td> --}}
                                    <td><img src="{{ ($slider->imagethumburl) ? $slider->imagethumburl : '/assets/admin/img/no_image.png' }}"  style="width: 300px"></td>
                                    <td>{!! $slider->status_label !!}</td>
                                    <td class="text-center">
                                        @can('sliders.delete')
                                            <button onClick="Delete(this.id)" class="btn btn-sm btn-danger" id="{{ $slider->id }}">
                                                <i class="fa fa-trash"></i>
                                            </button>
                                        @endcan
                                    </td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                        <div style="text-align: center">
                            {{$sliders->links("vendor.pagination.bootstrap-4")}}
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
                        url: "{{ route("admin.slider.index") }}/"+id,
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