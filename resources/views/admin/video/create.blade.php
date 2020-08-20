@extends('admin.templates.default')
@section("title")Create Video @endsection

@section('content')
    <div class="main-content">
        <section class="section">
            <div class="section-header">
                <h1>Tambah Video</h1>
            </div>

            <div class="section-body">

                <div class="card">
                    <div class="card-header">
                        <h4><i class="fas fa-video"></i> Tambah Video</h4>
                    </div>

                    <div class="card-body">
                        <form action="{{ route('admin.video.store') }}" method="POST">
                            @csrf

                            <div class="form-group">
                                <label>JUDUL VIDEO</label>
                                <input type="text" name="title" value="{{ old('title') }}" placeholder="Masukkan Judul Video" class="form-control @error('title') is-invalid @enderror">

                                @error('title')
                                <div class="invalid-feedback" style="display: block">
                                    {{ $message }}
                                </div>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label>EMBED YOUTUBE</label>
                                <input type="text" name="embed" value="{{ old('embed') }}" placeholder="Masukkan Embed YouTube" class="form-control @error('embed') is-invalid @enderror">
                                <div>
                                    <span>Example : https://www.youtube.com/<strong>embed/aN0ZnoRg_IY</strong></span>
                                </div>
                                @error('embed')
                                <div class="invalid-feedback" style="display: block">
                                    {{ $message }}
                                </div>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label>CAPTION</label>
                                <input type="text" name="caption" value="{{ old('caption') }}" placeholder="Masukkan Judul Foto" class="form-control @error('caption') is-invalid @enderror">

                                @error('caption')
                                <div class="invalid-feedback" style="display: block">
                                    {{ $message }}
                                </div>
                                @enderror
                            </div>

                            <button class="btn btn-primary mr-1 btn-submit" type="submit"><i class="fa fa-paper-plane"></i> SIMPAN</button>
                            <button class="btn btn-warning btn-reset" type="reset"><i class="fa fa-redo"></i> RESET</button>

                        </form>
                    </div>
                </div>
            </div>
        </section>
    </div>
@stop