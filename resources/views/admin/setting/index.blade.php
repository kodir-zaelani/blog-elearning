@extends('admin.templates.default')
@section("title")Setting @endsection

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
          <div class="breadcrumb-item">Setting Website</div>
        </div>
      </div>

      <div class="section-body">
        <div id="output-status"></div>

        @if (!$settings->count())
        <div class="row">
            <div class="col-12 col-md-12 col-sm-12">
              <div class="card">
                <div class="card-header">
                  <h4>Empty Data</h4>
                </div>
                <div class="card-body">
                  <div class="empty-state" data-height="400">
                    <div class="empty-state-icon">
                      <i class="fas fa-question"></i>
                    </div>
                    <h2>We couldn't find any data</h2>
                    <p class="lead">
                      Sorry we can't find any data, to get rid of this message, make at least 1 entry.
                    </p>
                    <a href="{{ route('admin.setting.create') }}" class="btn btn-primary mt-4">Create new One</a>
                  </div>
                </div>
              </div>
            </div>
        </div>
          @else
          <div class="row">
              <div class="col-12 col-sm-5 col-md-12 col-lg-12">
                @foreach ($settings as $setting)

                    <div class="card card-primary">
                        <div class="card-header">
                          <h4>Setting Website </h4>
                          <div class="card-header-action">
                            <a href="{{ route('admin.setting.edit', $setting->id) }}" class="btn btn-primary">
                                <i class="fa fa-pencil-alt"></i> Edit
                            </a>
                          </div>
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
                                            <input type="text" readonly name="title" value="{{ old('title', $setting->title) }}" class="form-control @error('title') is-invalid @enderror" id="title">
                                        </div>
                                    </div>
                                    <div class="form-group row align-items-center">
                                        <label for="url" class="form-control-label col-sm-3 text-md-right">URL</label>
                                        <div class="col-sm-6 col-md-9">
                                            <input type="text" readonly name="url" value="{{ old('url', $setting->url) }}" class="form-control @error('url') is-invalid @enderror" id="url">
                                        </div>
                                    </div>
                                    <div class="form-group row align-items-center">
                                        <label for="email" class="form-control-label col-sm-3 text-md-right">E-mail</label>
                                        <div class="col-sm-6 col-md-9">
                                            <input type="text" readonly name="email" value="{{ old('email', $setting->email) }}" class="form-control ">
                                        </div>
                                    </div>
                                    <div class="form-group row align-items-center">
                                        <label for="description" class="form-control-label col-sm-3 text-md-right">Site Description</label>
                                        <div class="col-sm-6 col-md-9">
                                            {!! $setting->description !!}
                                        </div>
                                        
                                    </div>
                                    <div class="form-group row align-items-center">
                                        <label class="form-control-label col-sm-3 text-md-right">Site Logo</label>
                                        <div class="col-sm-6 col-md-9">
                                            @if ($setting->logoUrl)
                                                <img src="{{ $setting->logoUrl }}">   
                                            @else
                                                <img src="{{ asset('/assets/admin/img/no_image.png') }}"  alt="...">
                                            @endif
                                        </div>
                                    </div>
                                    <div class="form-group row align-items-center">
                                        <label class="form-control-label col-sm-3 text-md-right">Favicon</label>
                                        <div class="col-sm-6 col-md-9">
                                            @if ($setting->faviconUrl)
                                                <img src="{{ $setting->faviconUrl }}">   
                                            @else
                                                <img src="{{ asset('/assets/admin/img/no_image.png') }}"  alt="...">
                                            @endif
                                        </div>
                                    </div>
                                </div>
                                <div class="tab-pane fade" id="profile4" role="tabpanel" aria-labelledby="profile-tab4">
                                    <div class="form-group row align-items-center">
                                        <label for="no_hp" class="form-control-label col-sm-3 text-md-right">No. Handphone </label>
                                        <div class="col-sm-6 col-md-9">
                                            <input type="text" readonly name="no_hp" value="{{ old('no_hp', $setting->no_hp) }}" class="form-control ">
                                        </div>
                                    </div>
                                    <div class="form-group row align-items-center">
                                        <label for="no_wa" class="form-control-label col-sm-3 text-md-right">No. Wa</label>
                                        <div class="col-sm-6 col-md-9">
                                            <input type="text" readonly name="no_wa" value="{{ old('no_wa', $setting->no_wa) }}" class="form-control ">
                                        </div>
                                    </div>
                                    
                                    <div class="form-group row align-items-center">
                                        <label for="facebook" class="form-control-label col-sm-3 text-md-right">Facebook</label>
                                        <div class="col-sm-6 col-md-9">
                                            <input type="text" readonly name="facebook" value="{{ old('facebook', $setting->facebook) }}" class="form-control ">
                                        </div>
                                    </div>
                                    <div class="form-group row align-items-center">
                                        <label for="youtube" class="form-control-label col-sm-3 text-md-right">Youtube</label>
                                        <div class="col-sm-6 col-md-9">
                                            <input type="text" readonly name="youtube" value="{{ old('youtube', $setting->youtube) }}" class="form-control ">
                                        </div>
                                    </div>
                                    <div class="form-group row align-items-center">
                                        <label for="instagram" class="form-control-label col-sm-3 text-md-right">Instagram</label>
                                        <div class="col-sm-6 col-md-9">
                                            <input type="text" readonly name="instagram" value="{{ old('instagram', $setting->instagram) }}" class="form-control ">
                                        </div>
                                    </div>
                                    <div class="form-group row align-items-center">
                                        <label for="twitter" class="form-control-label col-sm-3 text-md-right">Twitter</label>
                                        <div class="col-sm-6 col-md-9">
                                            <input type="text" readonly name="twitter" value="{{ old('twitter', $setting->twitter) }}" class="form-control ">
                                        </div>
                                    </div>
                                    <div class="form-group row align-items-center">
                                        <label for="glpus" class="form-control-label col-sm-3 text-md-right">GPlus</label>
                                        <div class="col-sm-6 col-md-9">
                                            <input type="text" readonly name="glpus" value="{{ old('glpus', $setting->glpus) }}" class="form-control ">
                                        </div>
                                    </div>
                                </div>
                                <div class="tab-pane fade" id="contact4" role="tabpanel" aria-labelledby="contact-tab4">
                                    <div class="form-group row align-items-center">
                                        <label for="seo" class="form-control-label col-sm-3 text-md-right">SEO</label>
                                        <div class="col-sm-6 col-md-9">
                                            <input type="text" readonly name="seo" value="{{ old('seo', $setting->seo) }}" class="form-control ">
                                        </div>
                                    </div>
                                    <div class="form-group row align-items-center">
                                        <label for="keywords" class="form-control-label col-sm-3 text-md-right">Keywords</label>
                                        <div class="col-sm-6 col-md-9">
                                            <input type="text" readonly name="keywords" value="{{ old('keywords', $setting->keywords) }}" class="form-control ">
                                        </div>
                                    </div>
                                    <div class="form-group row align-items-center">
                                        <label for="googleanalytics" class="form-control-label col-sm-3 text-md-right">Google Analytics</label>
                                        <div class="col-sm-6 col-md-9">
                                            <input type="text" readonly name="googleanalytics" value="{{ old('googleanalytics', $setting->googleanalytics) }}" class="form-control ">
                                        </div>
                                    </div>
                                </div>
                              </div>
                            </div>
                          </div>
                        </div>
                      </div>
                @endforeach
                  </div>
               </div>
        @endif
        
      </div>
      
    </section>
  </div>


@stop