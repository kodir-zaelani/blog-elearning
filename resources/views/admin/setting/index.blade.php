@extends('admin.templates.default')
@section("title")Categories @endsection

@section('content')
<div class="main-content">
    <section class="section">
      <div class="section-header">
        <div class="section-header-back">
          <a href="features-settings.html" class="btn btn-icon"><i class="fas fa-arrow-left"></i></a>
        </div>
        <h1>General Settings</h1>
        <div class="section-header-breadcrumb">
          <div class="breadcrumb-item active"><a href="#">Dashboard</a></div>
          <div class="breadcrumb-item active"><a href="#">Settings</a></div>
          <div class="breadcrumb-item">General Settings</div>
        </div>
      </div>

      <div class="section-body">
        <h2 class="section-title">All About General Settings</h2>
        <p class="section-lead">
          You can adjust all general settings here
        </p>

        <div id="output-status"></div>
        <div class="row">
          <div class="col-md-4">
            <div class="card">
              <div class="card-header">
                <h4>Jump To</h4>
              </div>
              <div class="card-body">
                <ul class="nav nav-pills flex-column">
                  <li class="nav-item"><a href="#" class="nav-link active">General</a></li>
                  <li class="nav-item"><a href="#" class="nav-link">SEO</a></li>
                  <li class="nav-item"><a href="#" class="nav-link">Email</a></li>
                  <li class="nav-item"><a href="#" class="nav-link">System</a></li>
                  <li class="nav-item"><a href="#" class="nav-link">Security</a></li>
                  <li class="nav-item"><a href="#" class="nav-link">Automation</a></li>
                </ul>
              </div>
            </div>
          </div>
          <div class="col-md-8">
            <form id="setting-form">
              <div class="card" id="settings-card">
                <div class="card-header">
                  <h4>General Settings</h4>
                </div>
                <div class="card-body">
                  <p class="text-muted">General settings such as, site title, site description, address and so on.</p>
                  <div class="form-group row align-items-center">
                    <label for="site-title" class="form-control-label col-sm-3 text-md-right">Site Title</label>
                    <div class="col-sm-6 col-md-9">
                      <input type="text" name="site_title" class="form-control" id="site-title">
                    </div>
                  </div>
                  <div class="form-group row align-items-center">
                    <label for="site-description" class="form-control-label col-sm-3 text-md-right">Site Description</label>
                    <div class="col-sm-6 col-md-9">
                      <textarea class="form-control" name="site_description" id="site-description"></textarea>
                    </div>
                  </div>
                  <div class="form-group row align-items-center">
                    <label class="form-control-label col-sm-3 text-md-right">Site Logo</label>
                    <div class="col-sm-6 col-md-9">
                      <div class="custom-file">
                        <input type="file" name="site_logo" class="custom-file-input" id="site-logo">
                        <label class="custom-file-label">Choose File</label>
                      </div>
                      <div class="form-text text-muted">The image must have a maximum size of 1MB</div>
                    </div>
                  </div>
                  <div class="form-group row align-items-center">
                    <label class="form-control-label col-sm-3 text-md-right">Favicon</label>
                    <div class="col-sm-6 col-md-9">
                      <div class="custom-file">
                        <input type="file" name="site_favicon" class="custom-file-input" id="site-favicon">
                        <label class="custom-file-label">Choose File</label>
                      </div>
                      <div class="form-text text-muted">The image must have a maximum size of 1MB</div>
                    </div>
                  </div>
                  <div class="form-group row">
                    <label class="form-control-label col-sm-3 mt-3 text-md-right">Google Analytics Code</label>
                    <div class="col-sm-6 col-md-9">
                      <textarea class="form-control codeeditor" name="google_analytics_code"></textarea>
                    </div>
                  </div>
                </div>
                <div class="card-footer bg-whitesmoke text-md-right">
                  <button class="btn btn-primary" id="save-btn">Save Changes</button>
                  <button class="btn btn-secondary" type="button">Reset</button>
                </div>
              </div>
            </form>
          </div>
        </div>
        <div class="row">
            <div class="col-12 col-sm-7 col-lg-12">
                <div class="card">
                  <div class="card-header">
                    <h4>Setting Web</h4>
                  </div>
                  <div class="card-body">
                    <div class="row">
                      <div class="col-12 col-sm-12 col-md-4">
                        <ul class="nav nav-pills flex-column" id="myTab4" role="tablist">
                          <li class="nav-item">
                            <a class="nav-link active" id="home-tab4" data-toggle="tab" href="#home4" role="tab" aria-controls="home" aria-selected="true">General</a>
                          </li>
                          <li class="nav-item">
                            <a class="nav-link" id="profile-tab4" data-toggle="tab" href="#profile4" role="tab" aria-controls="profile" aria-selected="false">SEO</a>
                          </li>
                          <li class="nav-item">
                            <a class="nav-link" id="contact-tab4" data-toggle="tab" href="#contact4" role="tab" aria-controls="contact" aria-selected="false">Social Media</a>
                          </li>
                          <li class="nav-item">
                            <a class="nav-link" id="contact-tab4" data-toggle="tab" href="#contact4" role="tab" aria-controls="contact" aria-selected="false">Address</a>
                          </li>
                        </ul>
                      </div>
                      <div class="col-12 col-sm-12 col-md-8">
                        <div class="tab-content no-padding" id="myTab2Content">
                          <div class="tab-pane fade show active" id="home4" role="tabpanel" aria-labelledby="home-tab4">
                            Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
                            tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
                            quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo
                            consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse
                            cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non
                            proident, sunt in culpa qui officia deserunt mollit anim id est laborum.
                          </div>
                          <div class="tab-pane fade" id="profile4" role="tabpanel" aria-labelledby="profile-tab4">
                            Sed sed metus vel lacus hendrerit tempus. Sed efficitur velit tortor, ac efficitur est lobortis quis. Nullam lacinia metus erat, sed fermentum justo rutrum ultrices. Proin quis iaculis tellus. Etiam ac vehicula eros, pharetra consectetur dui. Aliquam convallis neque eget tellus efficitur, eget maximus massa imperdiet. Morbi a mattis velit. Donec hendrerit venenatis justo, eget scelerisque tellus pharetra a.
                          </div>
                          <div class="tab-pane fade" id="contact4" role="tabpanel" aria-labelledby="contact-tab4">
                            Vestibulum imperdiet odio sed neque ultricies, ut dapibus mi maximus. Proin ligula massa, gravida in lacinia efficitur, hendrerit eget mauris. Pellentesque fermentum, sem interdum molestie finibus, nulla diam varius leo, nec varius lectus elit id dolor. Nam malesuada orci non ornare vulputate. Ut ut sollicitudin magna. Vestibulum eget ligula ut ipsum venenatis ultrices. Proin bibendum bibendum augue ut luctus.
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

{{-- <div class="main-content">
    <section class="section">
        <div class="section-header">
            <h1>Kategori</h1>
        </div>

        <div class="section-body">

            <div class="card">
                <div class="card-header">
                    <h4><i class="fas fa-folder"></i> Kategori</h4>
                </div>

                <div class="card-body">
                    <form action="{{ route('admin.category.index') }}" method="GET">
                        <div class="form-group">
                            <div class="input-group mb-3">
                                @can('categories.create')
                                    <div class="input-group-prepend">
                                        <a href="{{ route('admin.category.create') }}" class="btn btn-primary" style="padding-top: 10px;"><i class="fa fa-plus-circle"></i> TAMBAH</a>
                                    </div>
                                @endcan
                                <input type="text" class="form-control" name="q"
                                       placeholder="cari berdasarkan nama kategori">
                                <div class="input-group-append">
                                    <button type="submit" class="btn btn-primary"><i class="fa fa-search"></i> CARI
                                    </button>
                                </div>
                            </div>
                        </div>
                    </form>
                    <div class="table-responsive">
                        <table class="table table-bordered">
                            <thead>
                            <tr>
                                <th scope="col" style="text-align: center;width: 6%">NO.</th>
                                <th scope="col">NAMA KATEGORI</th>
                                <th scope="col">QR Code</th>
                                <th scope="col" style="width: 15%;text-align: center">AKSI</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach ($categories as $no => $category)
                                <tr>
                                    <th scope="row" style="text-align: center">{{ ++$no + ($categories->currentPage()-1) * $categories->perPage() }}</th>
                                    <td>{{ $category->title }}</td>
                                    <td>{!! QrCode::generate($category->title); !!}</td>
                                    <td class="text-center">
                                        @can('categories.edit')
                                            <a href="{{ route('admin.category.edit', $category->id) }}" class="btn btn-sm btn-primary">
                                                <i class="fa fa-pencil-alt"></i>
                                            </a>
                                        @endcan
                                        
                                        @can('categories.delete')
                                            <button onClick="Delete(this.id)" class="btn btn-sm btn-danger" id="{{ $category->id }}">
                                                <i class="fa fa-trash"></i>
                                            </button>  
                                        @endcan
                                    </td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                        <div style="text-align: center">
                            {{$categories->links("vendor.pagination.bootstrap-4")}}
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </section>
</div> --}}

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
                        url: "{{ route("admin.category.index") }}/"+id,
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

@stop