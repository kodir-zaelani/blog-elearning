@extends('admin.templates.default')
@section("title")Posts @endsection

@push('page-style')
<!-- Jasny Bootstrap 4 -->
<link rel="stylesheet" href="{{ asset('/assets/admin/modules/jasny-bootstrap/4.0.0/css/jasny-bootstrap.min.css')}}">
@endpush
@section('content')
<div class="main-content">
    <section class="section">
        <div class="section-header">
            <h1>Edit Berita</h1>
        </div>

        <div class="section-body">

            <div class="card">
                <div class="card-header">
                    <h4><i class="fas fa-book-open"></i> Edit Berita</h4>
                </div>

                <div class="card-body">
                    <form action="{{ route('admin.post.update', $post->id) }}" method="POST"
                        enctype="multipart/form-data">
                        @csrf
                        @method('PUT')
                        <div class="form-group">
                            <label>GAMBAR</label> <br/>
                            {{--  <input type="file" name="image" class="form-control @error('image') is-invalid @enderror">  --}}
                            <div class="fileinput fileinput-new text-center" data-provides="fileinput">
                                <div class="fileinput-new img-thumbnail" style="width: 200px;">
                                    <img src="{{ ($post->imageThumburl) ? $post->imageThumburl : '/assets/admin/img/no_image.png' }}"  alt="...">
                                    {{--  <img src="{{ ($post->image_thumb_url) ? $post->image_thumb_url : '/assets/admin/img/no_image.png' }}"  alt="...">  --}}
                                </div>
                                <div class="fileinput-preview fileinput-exists img-thumbnail" style="max-width: 200px;"></div>
                                <div>
                                  <span class="btn btn-outline-secondary btn-file"><span class="fileinput-new">Select image</span><span class="fileinput-exists">Change</span>
                                  <input type="file" class="@error('image') is-invalid @enderror" name="image" value="{{ old('image') }}"></span>
                                  <a href="#" class="btn btn-outline-secondary fileinput-exists" data-dismiss="fileinput">Remove</a>
                                </div>
                            </div>
                        </div>

                        <div class="form-group">
                            <label>JUDUL BERITA</label>
                            <input type="text" name="title" value="{{ old('title', $post->title) }}"
                                placeholder="Masukkan Judul Berita"
                                class="form-control @error('title') is-invalid @enderror">


                            @error('title')
                            <div class="invalid-feedback" style="display: block">
                                {{ $message }}
                            </div>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label>KATEGORI</label>
                            <select class="form-control select-category @error('category_id') is-invalid @enderror"
                                name="category_id">
                                <option value="">-- PILIH KATEGORI --</option>
                                @foreach ($categories as $category)
                                    @if($post->category_id == $category->id)
                                        <option value="{{ $category->id  }}" selected>{{ $category->title }}</option>
                                    @else
                                        <option value="{{ $category->id  }}">{{ $category->title }}</option>
                                    @endif
                                @endforeach
                            </select>
                            @error('category_id')
                            <div class="invalid-feedback" style="display: block">
                                {{ $message }}
                            </div>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label>KONTEN</label>
                            <textarea id="content" class="form-control content @error('content') is-invalid @enderror" name="content"
                                placeholder="Masukkan Konten / Isi Berita"
                                rows="100">{!! old('content', $post->content) !!}</textarea>
                            @error('content')
                            <div class="invalid-feedback" style="display: block">
                                {{ $message }}
                            </div>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label class="font-weight-bold">TAGS</label>
                            <select class="form-control" name="tags[]"
                                multiple="multiple">
                                @foreach ($tags as $tag)
                                    <option value="{{$tag->id}}" {{ in_array($tag->id, $post->tags()->pluck('id')->toArray()) ? 'selected' : '' }}> {{ $tag->title }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group">
                            <label class="d-block">Status</label>
                            <div class="form-check">
                              <input class="form-check-input" type="radio" name="status" 
                              {{$post->status == 1 ? "checked" : ""}} value=1 >
                              <label class="form-check-label" for="status">
                                Publish
                              </label>
                            </div>
                            <div class="form-check">
                              <input class="form-check-input" type="radio" name="status" 
                              {{$post->status == 0 ? "checked" : ""}} value=0  >
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
                        <button class="btn btn-primary mr-1 btn-submit" type="submit"><i class="fa fa-paper-plane"></i>
                            UPDATE</button>
                        <button class="btn btn-warning btn-reset" type="reset"><i class="fa fa-redo"></i> RESET</button>

                    </form>
                </div>
            </div>
        </div>
    </section>
</div>

 @include('admin.partials.ckeditor') 
{{-- @include('admin.partials.tinymce') --}}


@push('page-script')
<!-- Jasny Bootstrap 4 -->
<script src="{{ asset('/assets/admin/modules/jasny-bootstrap/4.0.0/js/jasny-bootstrap.min.js')}}"></script>
@endpush
@stop