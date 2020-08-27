@extends('admin.templates.default')
@section("title")Events @endsection
@push('page-style')
<!-- Jasny Bootstrap 4 -->
<link rel="stylesheet" href="{{ asset('/assets/admin/modules/jasny-bootstrap/4.0.0/css/jasny-bootstrap.min.css')}}">
@endpush
@section('content')
    <div class="main-content">
        <section class="section">
            <div class="section-header">
                <h1>Edit Agenda</h1>
            </div>

            <div class="section-body">

                <div class="card">
                    <div class="card-header">
                        <h4><i class="fas fa-bell"></i> Edit Agenda</h4>
                        <div class="card-header-action">
                            <a href="{{ route('admin.event.import', $event) }}" class="btn btn-sm btn-warning" title="Import Participant">
                                <i class="fas fa-users"></i>
                            </a>
                          </div>
                        
                        {{-- <a href="{{ route('admin.participant.import') }}" class="btn btn-primary">
                            Import
                       </a> --}}
                    </div>

                    <div class="card-body">
                        <form action="{{ route('admin.event.update', $event->id) }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            @method('PUT')
                            <div class="form-group">
                                <label>JUDUL AGENDA</label>
                                <input type="text" name="title" value="{{ old('title', $event->title) }}" placeholder="Masukkan Judul Agenda" class="form-control @error('title') is-invalid @enderror">

                                @error('title')
                                <div class="invalid-feedback" style="display: block">
                                    {{ $message }}
                                </div>
                                @enderror
                            </div>

                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>LOKASI</label>
                                        <input type="text" name="location" value="{{ old('location', $event->location) }}" placeholder="Masukkan Lokasi Agenda" class="form-control @error('location') is-invalid @enderror">
        
                                        @error('location')
                                        <div class="invalid-feedback" style="display: block">
                                            {{ $message }}
                                        </div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>TANGGAL</label>
                                        <input type="date" name="date" value="{{ old('date', $event->date) }}" class="form-control @error('date') is-invalid @enderror">
        
                                        @error('date')
                                        <div class="invalid-feedback" style="display: block">
                                            {{ $message }}
                                        </div>
                                        @enderror
                                    </div>
                                </div>
                            </div>

                            <div class="form-group">
                                <label>ISI AGENDA</label>
                                <textarea class="form-control content @error('content') is-invalid @enderror" name="content" placeholder="Masukkan Konten / Isi Agenda" rows="10">{!! old('content', $event->content) !!}</textarea>
                                @error('content')
                                <div class="invalid-feedback" style="display: block">
                                    {{ $message }}
                                </div>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label>Thumbnail</label> <br/>
                                <div class="fileinput fileinput-new text-center" data-provides="fileinput">
                                    <div class="fileinput-new img-thumbnail" style="width: 250px;">
                                        <img src="{{ ($event->imageThumburl) ? $event->imageThumburl : '/assets/admin/img/no_image.png' }}"  alt="...">
                                    </div>
                                    <div class="fileinput-preview fileinput-exists img-thumbnail" style="max-width: 250px;"></div>
                                    <div>
                                      <span class="btn btn-outline-secondary btn-file"><span class="fileinput-new">Select image</span><span class="fileinput-exists">Change</span>
                                      <input type="file" class="@error('image') is-invalid @enderror" name="image" value="{{ old('image') }}"></span>
                                      <a href="#" class="btn btn-outline-secondary fileinput-exists" data-dismiss="fileinput">Remove</a>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="d-block">Status</label>
                                <div class="form-check">
                                  <input class="form-check-input" type="radio" name="status" 
                                  {{$event->status == 1 ? "checked" : ""}} value=1 >
                                  <label class="form-check-label" for="status">
                                    Publish
                                  </label>
                                </div>
                                <div class="form-check">
                                  <input class="form-check-input" type="radio" name="status" 
                                  {{$event->status == 0 ? "checked" : ""}} value=0  >
                                  <label class="form-check-label" for="status">
                                    Draft
                                  </label>
                                </div>
                                @error('status')
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

    {{-- <script src="//cdn.tinymce.com/4/tinymce.min.js"></script>
    <script>
        var editor_config = {
            selector: "textarea.content",
            plugins: [
                "advlist autolink lists link image charmap print preview hr anchor pagebreak",
                "searchreplace wordcount visualblocks visualchars code fullscreen",
                "insertdatetime media nonbreaking save table contextmenu directionality",
                "emoticons template paste textcolor colorpicker textpattern"
            ],
            toolbar: "insertfile undo redo | styleselect | bold italic | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | link image media",
            relative_urls: false,
        };

        tinymce.init(editor_config);
    </script> --}}
    @include('admin.partials.ckeditor')

    @push('page-script')
    <!-- Jasny Bootstrap 4 -->
    <script src="{{ asset('/assets/admin/modules/jasny-bootstrap/4.0.0/js/jasny-bootstrap.min.js')}}"></script>
    @endpush
@stop