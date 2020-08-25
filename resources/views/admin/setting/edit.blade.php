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
                <div class="col-12 col-md-12 col-lg-12">
                    <div class="card card-primary">
                        <div class="card-header">
                          <h4>General</h4>
                        </div>
                        <form action="{{ route('admin.setting.update', $setting->id) }}" method="POST"
                            enctype="multipart/form-data">
                            @csrf
                            @method('PUT')
                            <div class="card-body">
                                <div class="form-group">
                                    <label for="title" >Site Title</label>
                                    <input type="text"  name="title" value="{{ old('title', $setting->title) }}" class="form-control @error('title') is-invalid @enderror" id="title">
                                    @error('title')
                                    <div class="invalid-feedback" style="display: block">
                                        <strong>{{ $message }}</strong>
                                    </div>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label for="url" >URL</label>
                                    <input type="text"  name="url" value="{{ old('url', $setting->url) }}" class="form-control @error('url') is-invalid @enderror" id="url">
                                    @error('url')
                                    <div class="invalid-feedback" style="display: block">
                                        <strong>{{ $message }}</strong>
                                    </div>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label for="description" >Description</label>
                                    <textarea class="form-control content @error('description') is-invalid @enderror" name="description"  id="description" rows="30">{!! $setting->description !!}</textarea>
                                    
                                    @error('description')
                                    <div class="invalid-feedback" style="display: block">
                                        {{ $message }}
                                    </div>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label for="email" >Email</label>
                                    <input type="email" required="" name="email" value="{{ old('email', $setting->email) }}" class="form-control @error('email') is-invalid @enderror" id="email">
                                    @error('email')
                                    <div class="invalid-feedback" style="display: block">
                                        <strong>{{ $message }}</strong>
                                    </div>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label for="no_hp" >No. Handphone</label>
                                    <input type="text"  name="no_hp" value="{{ old('no_hp', $setting->no_hp) }}" class="form-control @error('no_hp') is-invalid @enderror" id="no_hp">
                                    @error('no_hp')
                                    <div class="invalid-feedback" style="display: block">
                                        <strong>{{ $message }}</strong>
                                    </div>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label for="no_wa" >No. Whatapps</label>
                                    <input type="text"  name="no_wa" value="{{ old('no_wa', $setting->no_wa) }}" class="form-control @error('no_wa') is-invalid @enderror" id="no_wa">
                                    @error('no_wa')
                                    <div class="invalid-feedback" style="display: block">
                                        <strong>{{ $message }}</strong>
                                    </div>
                                    @enderror
                                </div>
                                
                                <div class="form-group">
                                    <label for="facebook">Facebook</label>
                                    <input type="text"  name="facebook" value="{{ old('facebook', $setting->facebook) }}" class="form-control @error('facebook') is-invalid @enderror" id="facebook">
                                    @error('facebook')
                                    <div class="invalid-feedback" style="display: block">
                                        <strong>{{ $message }}</strong>
                                    </div>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label for="instagram">Instagram</label>
                                    <input type="text"  name="instagram" value="{{ old('instagram', $setting->instagram) }}" class="form-control @error('instagram') is-invalid @enderror" id="instagram">
                                    @error('instagram')
                                    <div class="invalid-feedback" style="display: block">
                                        <strong>{{ $message }}</strong>
                                    </div>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label for="youtube">Chanel Youtube</label>
                                    <input type="text"  name="youtube" value="{{ old('youtube', $setting->youtube) }}" class="form-control @error('youtube') is-invalid @enderror" id="youtube">
                                    @error('youtube')
                                    <div class="invalid-feedback" style="display: block">
                                        <strong>{{ $message }}</strong>
                                    </div>
                                    @enderror
                                </div>
                            
                                <div class="form-group">
                                <label>Site Logo</label> <br/>
                                <div class="fileinput fileinput-new text-center" data-provides="fileinput">
                                    <div class="fileinput-new img-thumbnail" style="width: 200px;">
                                        <img src="{{ ($setting->logoUrl) ? $setting->logoUrl : '/assets/admin/img/no_image.png' }}"  alt="...">
                                    </div>
                                    <div class="fileinput-preview fileinput-exists img-thumbnail" style="max-width: 200px;"></div>
                                    <div>
                                    <span class="btn btn-outline-secondary btn-file"><span class="fileinput-new">Select image</span><span class="fileinput-exists">Change</span>
                                    <input type="file" class="@error('logo') is-invalid @enderror" name="logo" value="{{ old('logo') }}"></span>
                                    <a href="#" class="btn btn-outline-secondary fileinput-exists" data-dismiss="fileinput">Remove</a>
                                    </div>
                                </div>
                                </div>
                           
                                <div class="form-group">
                                <label>Favicon</label> <br/>
                                <div class="fileinput fileinput-new text-center" data-provides="fileinput">
                                    <div class="fileinput-new img-thumbnail" style="width: 200px;">
                                        <img src="{{ ($setting->faviconUrl) ? $setting->faviconUrl : '/assets/admin/img/no_image.png' }}"  alt="...">
                                    </div>
                                    <div class="fileinput-preview fileinput-exists img-thumbnail" style="max-width: 200px;"></div>
                                    <div>
                                    <span class="btn btn-outline-secondary btn-file"><span class="fileinput-new">Select image</span><span class="fileinput-exists">Change</span>
                                    <input type="file" class="@error('favicon') is-invalid @enderror" name="favicon" value="{{ old('favicon') }}"></span>
                                    <a href="#" class="btn btn-outline-secondary fileinput-exists" data-dismiss="fileinput">Remove</a>
                                    </div>
                                </div>
                                </div>
                          
                                <div class="form-group">
                                    <label for="seo" >SEO</label>
                                    <input type="text"  name="seo" value="{{ old('seo', $setting->seo) }}" class="form-control @error('seo') is-invalid @enderror" id="seo">
                                    @error('seo')
                                    <div class="invalid-feedback" style="display: block">
                                        <strong>{{ $message }}</strong>
                                    </div>
                                    @enderror
                                </div>
                                
                                <div class="form-group">
                                    <label for="keywords" >Keywords</label>
                                    <textarea class="form-control  @error('keywords') is-invalid @enderror"  name="keywords"  id="keywords" rows="30">{!! $setting->keywords !!}</textarea>
                                    @error('keywords')
                                    <div class="invalid-feedback" style="display: block">
                                        {{ $message }}
                                    </div>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label for="googleanalytics" >Google Analytics</label>
                                    <textarea class="form-control  @error('googleanalytics') is-invalid @enderror" name="googleanalytics"  id="googleanalytics" rows="30">{!! $setting->googleanalytics !!}</textarea>
                                    
                                    @error('googleanalytics')
                                    <div class="invalid-feedback" style="display: block">
                                        {{ $message }}
                                    </div>
                                    @enderror
                                </div>
                            </div>
                            <div class="card-footer">
                                <button class="btn btn-primary mr-1 btn-submit" type="submit"><i class="fa fa-paper-plane"></i> Update</button>
                                <button class="btn btn-warning btn-reset" type="reset"><i class="fa fa-redo"></i> RESET</button>
                            </div>
                        </form>
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