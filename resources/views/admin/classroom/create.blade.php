@extends('admin.templates.default')
@section("title")Posts @endsection

@section('content')
    <div class="main-content">
        <section class="section">
            <div class="section-header">
                <h1>Tambah Berita</h1>
            </div>

            <div class="section-body">

                <div class="card">
                    <div class="card-header">
                        <h4><i class="fas fa-book-open"></i> Tambah Berita</h4>
                    </div>

                    <div class="card-body">
                        <form action="{{ route('admin.post.store') }}" method="POST" enctype="multipart/form-data">
                            @csrf

                            <div class="row">
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label>LEVEL CLASS</label>
                                        <select class="form-control select-category @error('category_id') is-invalid @enderror" name="category_id">
                                            <option value="">-- SELECT --</option>
                                            @foreach ($levelclasses as $levelclass)
                                                <option value="{{ $levelclass->id }}">
                                                    {{ $levelclass->title }} | {{ $levelclass->idalphabet }} | {{ $levelclass->enalphabet }}
                                                </option>
                                            @endforeach
                                        </select>
                                        @error('levelclass_id')
                                        <div class="invalid-feedback" style="display: block">
                                            {{ $message }}
                                        </div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-md-8">
                                            <div class="form-group">
                                                <label>DEPARTMENT</label>
                                                <select class="form-control select-category @error('category_id') is-invalid @enderror" name="category_id">
                                                    <option value="">-- SELECT --</option>
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
                            </div>
                            
                            <div class="form-group">
                                <label>NAMA ROMBEL</label>
                                <input type="text" name="complete_title" value="{{ old('complete_title') }}" placeholder="Masukkan Judul Berita" class="form-control @error('complete_title') is-invalid @enderror">

                                @error('complete_title')
                                <div class="invalid-feedback" style="display: block">
                                    {{ $message }}
                                </div>
                                @enderror
                            </div>
                            
                            <div class="form-group">
                                <label>Ruang</label>
                                <input type="text" name="short_title" value="{{ old('short_title') }}" placeholder="Masukkan Judul Berita" class="form-control @error('short_title') is-invalid @enderror">

                                @error('short_title')
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

    @include('admin.partials.ckeditor')
    
    @push('page-style')
    <!-- Jasny Bootstrap 4 -->
    <link rel="stylesheet" href="{{ asset('/assets/admin/modules/jasny-bootstrap/4.0.0/css/jasny-bootstrap.min.css')}}">
    @endpush

    @push('page-script')
    <!-- Jasny Bootstrap 4 -->
    <script src="{{ asset('/assets/admin/modules/jasny-bootstrap/4.0.0/js/jasny-bootstrap.min.js')}}"></script>
    @endpush

@stop