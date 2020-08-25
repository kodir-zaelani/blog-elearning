@extends('admin.templates.default')
@section("title")Edit Setting 

@section('content')
<div class="main-content">
    <section class="section">
      <div class="section-header">
        <div class="section-header-back">
          <a href="{{ route('admin.') }}" class="btn btn-icon"><i class="fas fa-arrow-left"></i></a>
        </div>
        <h1>Setting Website</h1>
        <div class="section-header-breadcrumb">
          <div class="breadcrumb-item active"><a href="#">Dashboard</a></div>
          <div class="breadcrumb-item active"><a href="#">Settings</a></div>
          <div class="breadcrumb-item">Edit Setting</div>
        </div>
      </div>
        
        <div class="section-body">
            <div id="output-status"></div>

            <div class="row">
                <div class="col-12 col-sm-5 col-md-12 col-lg-12">
                    <div class="card card-primary">
                        <div class="card-header">
                            <h4>Edit Setting Website</h4>
                        </div>
                        <div class="card-body">
                            <div class="row">
                                <div class="col-12 col-sm-12 col-md-4">
                                  <ul class="nav nav-pills flex-column" id="myTab4" role="tablist">
                                    <li class="nav-item">
                                      <a class="nav-link active" id="home-tab4" data-toggle="tab" href="#home4" role="tab" aria-controls="home" aria-selected="true">General</a>
                                    </li>
                                    <li class="nav-item">
                                      <a class="nav-link" id="profile-tab4" data-toggle="tab" href="#profile4" role="tab" aria-controls="profile" aria-selected="false">Contact</a>
                                    </li>
                                    <li class="nav-item">
                                      <a class="nav-link" id="contact-tab4" data-toggle="tab" href="#contact4" role="tab" aria-controls="contact" aria-selected="false">SEO</a>
                                    </li>
                                  </ul>
                                </div>
                                <div class="col-12 col-sm-12 col-md-8">
                                  <div class="tab-content no-padding" id="myTab2Content">
                                        <div class="tab-pane fade show active" id="home4" role="tabpanel" aria-labelledby="home-tab4">
                                        
                                        <div class="form-group row align-items-center">
                                            <label for="title" class="form-control-label col-sm-3 text-md-right">Site Title </label>
                                            <div class="col-sm-6 col-md-9">
                                                <input type="text"  name="title" value="{{ old('title', $setting->title) }}" class="form-control @error('title') is-invalid @enderror" id="title">
                                            </div>
                                            @error('title')
                                            <div class="invalid-feedback" style="display: block">
                                                {{ $message }}
                                            </div>
                                            @enderror
                                        </div>
                                        </div>
                                        <div class="form-group row align-items-center">
                                            <label for="url" class="form-control-label col-sm-3 text-md-right">URL</label>
                                            <div class="col-sm-6 col-md-9">
                                                <input type="text"  name="url" value="{{ old('url', $setting->url) }}" class="form-control @error('url') is-invalid @enderror" id="url">
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
                                                <textarea class="form-control content @error('description') is-invalid @enderror" name="description"  id="description">{!! $setting->description !!}</textarea>
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
                                                        @if ($setting->logoUrl)
                                                        <img src="{{ $setting->logoUrl }}">   
                                                        @else
                                                            <img src="{{ asset('/assets/admin/img/no_image.png') }}"  alt="...">
                                                        @endif
                                                    </div>
                                                    <div class="fileinput-preview fileinput-exists img-thumbnail" style="max-width: 200px;"></div>
                                                    <div>
                                                      <span class="btn btn-outline-secondary btn-file"><span class="fileinput-new">Select image</span><span class="fileinput-exists">Change</span>
                                                      <input type="file" class="@error('logo') is-invalid @enderror" name="logo" value="{{ old('logo') }}"></span>
                                                      <a href="#" class="btn btn-outline-secondary fileinput-exists" data-dismiss="fileinput">Remove</a>
                                                    </div>
                                                </div>
                                                <div class="form-text text-muted">The logo must have a maximum size of 1MB</div>
                                            </div>
                                            @error('logo')
                                            <div class="invalid-feedback" style="display: block">
                                                {{ $message }}
                                            </div>
                                            @enderror
                                        </div>
                                        <div class="form-group row align-items-center">
                                            <label class="form-control-label col-sm-3 text-md-right">Favicon</label>
                                            <div class="col-sm-6 col-md-9">
                                                
                                                <div class="fileinput fileinput-new text-center" data-provides="fileinput">
                                                    <div class="fileinput-new img-thumbnail" style="width: 200px;">
                                                        @if ($setting->faviconUrl)
                                                            <img src="{{ $setting->faviconUrl }}">   
                                                        @else
                                                            <img src="{{ asset('/assets/admin/img/no_image.png') }}"  alt="...">
                                                        @endif
                                                    </div>
                                                    <div class="fileinput-preview fileinput-exists img-thumbnail" style="max-width: 200px;"></div>
                                                    <div>
                                                      <span class="btn btn-outline-secondary btn-file"><span class="fileinput-new">Select image</span><span class="fileinput-exists">Change</span>
                                                      <input type="file" class="@error('favicon') is-invalid @enderror" name="favicon" value="{{ old('favicon') }}"></span>
                                                      <a href="#" class="btn btn-outline-secondary fileinput-exists" data-dismiss="fileinput">Remove</a>
                                                    </div>
                                                </div>
                                                <div class="form-text text-muted">The favicon must have a maximum size of 1MB</div>
                                            </div>
                                            @error('favicon')
                                            <div class="invalid-feedback" style="display: block">
                                                {{ $message }}
                                            </div>
                                            @enderror
                                        </div>
                                        <button class="btn btn-primary mr-1 btn-submit" type="submit"><i class="fa fa-paper-plane"></i> Update</button>
                                        <button class="btn btn-warning btn-reset" type="reset"><i class="fa fa-redo"></i> RESET</button>
                                        
                                    </div>

                                    <div class="tab-pane fade" id="profile4" role="tabpanel" aria-labelledby="profile-tab4">
                                        <div class="form-group row align-items-center">
                                            <label for="no_hp" class="form-control-label col-sm-3 text-md-right">No. Handphone </label>
                                            <div class="col-sm-6 col-md-9">
                                                <input type="text"  name="no_hp" value="{{ old('no_hp', $setting->no_hp) }}" class="form-control ">
                                            </div>
                                        </div>
                                        <div class="form-group row align-items-center">
                                            <label for="no_wa" class="form-control-label col-sm-3 text-md-right">No. Wa</label>
                                            <div class="col-sm-6 col-md-9">
                                                <input type="text"  name="no_wa" value="{{ old('no_wa', $setting->no_wa) }}" class="form-control ">
                                            </div>
                                        </div>
                                        <div class="form-group row align-items-center">
                                            <label for="email" class="form-control-label col-sm-3 text-md-right">E-mail</label>
                                            <div class="col-sm-6 col-md-9">
                                                <input type="text"  name="email" value="{{ old('email', $setting->email) }}" class="form-control ">
                                            </div>
                                        </div>
                                        <div class="form-group row align-items-center">
                                            <label for="facebook" class="form-control-label col-sm-3 text-md-right">Facebook</label>
                                            <div class="col-sm-6 col-md-9">
                                                <input type="text"  name="facebook" value="{{ old('facebook', $setting->facebook) }}" class="form-control ">
                                            </div>
                                        </div>
                                        <div class="form-group row align-items-center">
                                            <label for="youtube" class="form-control-label col-sm-3 text-md-right">Youtube</label>
                                            <div class="col-sm-6 col-md-9">
                                                <input type="text"  name="youtube" value="{{ old('youtube', $setting->youtube) }}" class="form-control ">
                                            </div>
                                        </div>
                                        <div class="form-group row align-items-center">
                                            <label for="instagram" class="form-control-label col-sm-3 text-md-right">Instagram</label>
                                            <div class="col-sm-6 col-md-9">
                                                <input type="text"  name="instagram" value="{{ old('instagram', $setting->instagram) }}" class="form-control ">
                                            </div>
                                        </div>
                                        <div class="form-group row align-items-center">
                                            <label for="twitter" class="form-control-label col-sm-3 text-md-right">Twitter</label>
                                            <div class="col-sm-6 col-md-9">
                                                <input type="text"  name="twitter" value="{{ old('twitter', $setting->twitter) }}" class="form-control ">
                                            </div>
                                        </div>
                                        <div class="form-group row align-items-center">
                                            <label for="glpus" class="form-control-label col-sm-3 text-md-right">GPlus</label>
                                            <div class="col-sm-6 col-md-9">
                                                <input type="text"  name="glpus" value="{{ old('glpus', $setting->glpus) }}" class="form-control ">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="tab-pane fade" id="contact4" role="tabpanel" aria-labelledby="contact-tab4">
                                        <div class="form-group row align-items-center">
                                            <label for="seo" class="form-control-label col-sm-3 text-md-right">SEO</label>
                                            <div class="col-sm-6 col-md-9">
                                                <input type="text"  name="seo" value="{{ old('seo', $setting->seo) }}" class="form-control ">
                                            </div>
                                        </div>
                                        <div class="form-group row align-items-center">
                                            <label for="keywords" class="form-control-label col-sm-3 text-md-right">Keywords</label>
                                            <div class="col-sm-6 col-md-9">
                                                <input type="text"  name="keywords" value="{{ old('keywords', $setting->keywords) }}" class="form-control ">
                                            </div>
                                        </div>
                                        <div class="form-group row align-items-center">
                                            <label for="googleanalytics" class="form-control-label col-sm-3 text-md-right">Google Analytics</label>
                                            <div class="col-sm-6 col-md-9">
                                                <input type="text"  name="googleanalytics" value="{{ old('googleanalytics', $setting->googleanalytics) }}" class="form-control ">
                                            </div>
                                        </div>
                                    </div>
                                  </div>
                                </div>
                              </div>
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