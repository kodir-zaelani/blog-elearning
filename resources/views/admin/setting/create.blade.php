@extends('admin.templates.default')
@section("title")Create Setting 

@section('content')
<div class="main-content">
    <section class="section">
        <div class="section-header">
            <div class="section-header-back">
                <a href="features-settings.html" class="btn btn-icon"><i class="fas fa-arrow-left"></i></a>
            </div>
            <h1>Create Settings</h1>
            <div class="section-header-breadcrumb">
                <div class="breadcrumb-item active"><a href="#">Dashboard</a></div>
                <div class="breadcrumb-item active"><a href="#">Settings</a></div>
                <div class="breadcrumb-item">Create Settings</div>
            </div>
        </div>
        
        <div class="section-body">
            <div id="output-status"></div>     
           <div class="row">
                <div class="col-12 col-md-12 col-lg-12">
                    <div class="card">
                        <div class="card-header">
                          <h4>Setting Website</h4>
                        </div>
                        <div class="card-body">

                            <form action="{{ route('admin.setting.store') }}" method="POST" enctype="multipart/form-data">
                                @csrf
                                <div class="form-group row align-items-center">
                                    <label for="title" class="form-control-label col-sm-3 text-md-right">Site Title</label>
                                    <div class="col-sm-6 col-md-9">
                                        <input type="text" name="title" value="{{ old('title') }}" class="form-control @error('title') is-invalid @enderror" id="title">
                                    </div>
                                    @error('title')
                                    <div class="invalid-feedback" style="display: block">
                                        {{ $message }}
                                    </div>
                                    @enderror
                                </div>
                                <div class="form-group row align-items-center">
                                    <label for="url" class="form-control-label col-sm-3 text-md-right">URL</label>
                                    <div class="col-sm-6 col-md-9">
                                        <input type="text" name="url" value="{{ old('url') }}" class="form-control @error('url') is-invalid @enderror" id="url">
                                    </div>
                                    @error('url')
                                    <div class="invalid-feedback" style="display: block">
                                        {{ $message }}
                                    </div>
                                    @enderror
                                </div>
                                <div class="form-group row align-items-center">
                                    <label for="description" class="form-control-label col-sm-3 text-md-right">Site Description</label>
                                    <div class="col-sm-6 col-md-9">
                                        <textarea class="form-control @error('description') is-invalid @enderror" name="description" value="{{ old('description') }}" id="description"></textarea>
                                    </div>
                                    @error('description')
                                    <div class="invalid-feedback" style="display: block">
                                        {{ $message }}
                                    </div>
                                    @enderror
                                </div>
                                <div class="form-group row align-items-center">
                                    <label class="form-control-label col-sm-3 text-md-right">Site Logo</label>
                                    <div class="col-sm-6 col-md-9">
                                        <div class="fileinput fileinput-new text-center" data-provides="fileinput">
                                            <div class="fileinput-new img-thumbnail" style="width: 200px;">
                                              <img src="{{ asset('/assets/admin/img/no_image.png') }}"  alt="...">
                                            </div>
                                            <div class="fileinput-preview fileinput-exists img-thumbnail" style="max-width: 200px;"></div>
                                            <div>
                                              <span class="btn btn-outline-secondary btn-file"><span class="fileinput-new">Select image</span><span class="fileinput-exists">Change</span>
                                              <input type="file" class="@error('logo') is-invalid @enderror" name="logo" value="{{ old('logo') }}"></span>
                                              <a href="#" class="btn btn-outline-secondary fileinput-exists" data-dismiss="fileinput">Remove</a>
                                            </div>
                                        </div>
                                        <div class="form-text text-muted">The logo must have a maximum size of 1MB</div>
                                        @error('logo')
                                        <div class="invalid-feedback" style="display: block">
                                            {{ $message }}
                                        </div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="form-group row align-items-center">
                                    <label class="form-control-label col-sm-3 text-md-right">Favicon</label>
                                    <div class="col-sm-6 col-md-9">
                                        <div class="fileinput fileinput-new text-center" data-provides="fileinput">
                                            <div class="fileinput-new img-thumbnail" style="width: 200px;">
                                                <img src="{{ asset('/assets/admin/img/no_image.png') }}"  alt="...">
                                            </div>
                                            <div class="fileinput-preview fileinput-exists img-thumbnail" style="max-width: 200px;"></div>
                                            <div>
                                                <span class="btn btn-outline-secondary btn-file"><span class="fileinput-new">Select image</span><span class="fileinput-exists">Change</span>
                                                <input type="file" class="@error('favicon') is-invalid @enderror" name="favicon" value="{{ old('favicon') }}"></span>
                                                <a href="#" class="btn btn-outline-secondary fileinput-exists" data-dismiss="fileinput">Remove</a>
                                            </div>
                                        </div>
                                        <div class="form-text text-muted">The favicon must have a maximum size of 1MB</div>
                                        @error('favicon')
                                        <div class="invalid-feedback" style="display: block">
                                            {{ $message }}
                                        </div>
                                        @enderror
                                    </div>
                                </div>
                                
                                <button class="btn btn-primary mr-1 btn-submit" type="submit"><i class="fa fa-paper-plane"></i> Save Change</button>
                                <button class="btn btn-warning btn-reset" type="reset"><i class="fa fa-redo"></i> RESET</button>
                                
                            </form>
                         
                        </div>
                      </div>
                </div>
            </div>
        </div>
        
    </section>
</div> 
@include('admin.partials.tinymce')

@push('page-style')
<!-- Jasny Bootstrap 4 -->
<link rel="stylesheet" href="{{ asset('/assets/admin/modules/jasny-bootstrap/4.0.0/css/jasny-bootstrap.min.css')}}">
@endpush

@push('page-script')
<!-- Jasny Bootstrap 4 -->
<script src="{{ asset('/assets/admin/modules/jasny-bootstrap/4.0.0/js/jasny-bootstrap.min.js')}}"></script>
@endpush
@stop