@extends('admin.templates.default')
@section("title")Departments @endsection

@section('content')
    <div class="main-content">
        <section class="section">
            <div class="section-header">
                <h1>Edit Jurusan</h1>
            </div>

            <div class="section-body">

                <div class="card">
                    <div class="card-header">
                        <h4><i class="fas fa-folder"></i> Edit Jurusan</h4>
                    </div>

                    <div class="card-body">
                        <form action="{{ route('admin.department.update', $department->id) }}" method="POST">
                            @csrf
                            @method('PUT')
                            <div class="form-group">
                                <label>Nama Jurusan (id)</label>
                                <input type="text" name="title_id" value="{{ old('title_id', $department->title_id) }}" placeholder="Masukkan Nama Jurusan" class="form-control @error('title_id') is-invalid @enderror">

                                @error('title_id')
                                <div class="invalid-feedback" style="display: block">
                                    {{ $message }}
                                </div>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label>Nama Jurusan (id)</label>
                                <input type="text" name="short_id" value="{{ old('short_id', $department->short_id) }}" placeholder="Masukkan Nama Jurusan" class="form-control @error('short_id') is-invalid @enderror">

                                @error('short_id')
                                <div class="invalid-feedback" style="display: block">
                                    {{ $message }}
                                </div>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label>Nama Jurusan (en)</label>
                                <input type="text" name="title_en" value="{{ old('title_en', $department->title_en) }}" placeholder="Masukkan Nama Jurusan" class="form-control @error('title_en') is-invalid @enderror">

                                @error('title_en')
                                <div class="invalid-feedback" style="display: block">
                                    {{ $message }}
                                </div>
                                @enderror
                            </div>
                            
                            <div class="form-group">
                                <label>Nama Jurusan (en)</label>
                                <input type="text" name="short_en" value="{{ old('short_en', $department->short_en) }}" placeholder="Masukkan Nama Jurusan" class="form-control @error('short_en') is-invalid @enderror">

                                @error('short_en')
                                <div class="invalid-feedback" style="display: block">
                                    {{ $message }}
                                </div>
                                @enderror
                            </div>

                            <button class="btn btn-primary mr-1 btn-submit" type="submit"><i class="fa fa-paper-plane"></i> UPDATE</button>
                            <button class="btn btn-warning btn-reset" type="reset"><i class="fa fa-redo"></i> RESET</button>

                        </form>
                    </div>
                </div>
            </div>
        </section>
    </div>
@stop