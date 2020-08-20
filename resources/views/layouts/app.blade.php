<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, shrink-to-fit=no" name="viewport">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Dashboard &mdash; Widia Wahyuni</title>
    <link rel="shortcut icon" href="{{ asset('assets/admin/img/school.svg') }}" type="image/x-icon">
    <!-- General CSS Files -->
    <link rel="stylesheet" href="{{ asset('assets/admin/modules/bootstrap/css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/admin/modules/fontawesome/css/all.min.css') }}">

    <!-- CSS Libraries -->
    <link rel="stylesheet" href="{{ asset('assets/admin/modules/select2/dist/css/select2.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/admin/css/select2-bootstrap4.css') }}" />
    @stack('page-style')
    <!-- Template CSS -->
    <link rel="stylesheet" href="{{ asset('assets/admin/css/style.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/admin/css/components.css') }}">

    <script src="{{ asset('assets/admin/modules/jquery.min.js') }}"></script>
    <script src="{{ asset('assets/admin/js/sweetalert.min.js') }}"></script>

</head>

<body style="background: #e2e8f0">
    <div id="app">
        <div class="main-wrapper main-wrapper-1">
            <div class="navbar-bg"></div>
            <nav class="navbar navbar-expand-lg main-navbar">
                <form class="form-inline mr-auto">
                    <ul class="navbar-nav mr-3">
                        <li><a href="#" data-toggle="sidebar" class="nav-link nav-link-lg"><i
                                    class="fas fa-bars"></i></a></li>
                    </ul>
                </form>
                <ul class="navbar-nav navbar-right">

                    <li class="dropdown"><a href="#" data-toggle="dropdown"
                            class="nav-link dropdown-toggle nav-link-lg nav-link-user">
                            <img alt="image" src="{{ asset('assets/admin/img/avatar/avatar-1.png') }}"
                                class="rounded-circle mr-1">
                            <div class="d-sm-none d-lg-inline-block">Hi, {{ auth()->user()->name }}</div>
                        </a>
                        <div class="dropdown-menu dropdown-menu-right">
                            <a href="{{ route('logout') }}" style="cursor: pointer" onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();"
                                class="dropdown-item has-icon text-danger">
                                <i class="fas fa-sign-out-alt"></i> Logout
                            </a>
                            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                @csrf
                            </form>
                        </div>
                    </li>
                </ul>
            </nav>
            <div class="main-sidebar sidebar-style-2">
                <aside id="sidebar-wrapper">
                    <div class="sidebar-brand">
                        <a href="{{ route('admin.') }}">Widia Wahyuni</a>
                    </div>
                    <div class="sidebar-brand sidebar-brand-sm">
                        <a href="{{ route('admin.') }}">Widia</a>
                    </div>
                    <ul class="sidebar-menu">
                        <li class="menu-header">MAIN MENU</li>
                        <li class="{{ setActive('admin/dashboard') }}"><a class="nav-link"
                                href="{{ route('admin.') }}"><i class="fas fa-tachometer-alt"></i>
                                <span>Dashboard</span></a></li>


                        @if(auth()->user()->can('posts.index') || auth()->user()->can('tags.index') || auth()->user()->can('categories.index'))
                        <li class="menu-header">Posts</li>
                        @endif
                        <li
                            class="dropdown {{ setActive('admin/post'). setActive('admin/tag'). setActive('admin/category') }}">
                            @if(auth()->user()->can('posts.index') || auth()->user()->can('tags.index') || auth()->user()->can('categories.index'))
                                <a href="#" class="nav-link has-dropdown"><i class="far fa-file-alt"></i> <span>Post Management
                                </span></a>
                            @endif
                            
                            <ul class="dropdown-menu">

                                @can('tags.index')
                                <li class="{{ setActive('admin/tag') }}"><a class="nav-link"
                                        href="{{ route('admin.tag.index') }}"><i class="fas fa-tags"></i> <span>Tag</span></a>
                                </li>
                                @endcan

                                @can('categories.index')
                                <li class="{{ setActive('admin/category') }}"><a class="nav-link"
                                        href="{{ route('admin.category.index') }}"><i class="fas fa-folder"></i>
                                        <span>Category</span></a></li>
                                @endcan

                                @can('posts.index')
                                <li class="{{ setActive('admin/post') }}"><a class="nav-link"
                                        href="{{ route('admin.post.index') }}"><i class="fas fa-book-open"></i>
                                        <span>Post</span></a></li>
                                @endcan
                            </ul>
                        </li>

                        @if(auth()->user()->can('photos.index') || auth()->user()->can('albums.index') || auth()->user()->can('videos.index') || auth()->user()->can('events.index') || auth()->user()->can('albums.index'))
                        <li class="menu-header">GALERI | SLIDER | EVENT</li>
                        @endif

                        <li
                            class="dropdown {{ setActive('admin/album'). setActive('admin/photo'). setActive('admin/video'). setActive('admin/slider'). setActive('admin/event') }}">
                            @if(auth()->user()->can('albums.index') || auth()->user()->can('photos.index') || auth()->user()->can('sliders.index') || auth()->user()->can('videos.index'))
                                <a href="#" class="nav-link has-dropdown"><i class="fas fa-th-large"></i> <span>Gallery Management
                                </span></a>
                            @endif
                            
                            <ul class="dropdown-menu">
                                @can('albums.index')
                                <li class="{{ setActive('admin/album') }}"><a class="nav-link"
                                        href="{{ route('admin.album.index') }}"><i class="fas fa-image"></i>
                                        <span>Album</span></a></li>
                                @endcan

                                @can('photos.index')
                                <li class="{{ setActive('admin/photo') }}"><a class="nav-link"
                                        href="{{ route('admin.photo.index') }}"><i class="fas fa-image"></i>
                                        <span>Photo</span></a></li>
                                @endcan

                                @can('videos.index')
                                <li class="{{ setActive('admin/video') }}"><a class="nav-link"
                                        href="{{ route('admin.video.index') }}"><i class="fas fa-video"></i>
                                        <span>Video</span></a></li>
                                @endcan
                                @can('sliders.index')
                                <li class="{{ setActive('admin/slider') }}"><a class="nav-link"
                                        href="{{ route('admin.slider.index') }}"><i class="fas fa-laptop"></i>
                                        <span>Slider</span></a></li>
                                @endcan

                                @can('events.index')
                                <li class="{{ setActive('admin/event') }}"><a class="nav-link"
                                        href="{{ route('admin.event.index') }}"><i class="fas fa-bell"></i>
                                        <span>Agenda</span></a></li>
                                @endcan
                            </ul>
                        </li>                    

                        <li class="menu-header">E-Learning Management</li>
                            <li class="nav-item dropdown">
                                <a href="#" class="nav-link has-dropdown" data-toggle="dropdown"><i class="fas fa-columns"></i> <span> E-Learning </span></a>
                                <ul class="dropdown-menu">
                                <li><a class="nav-link" href="{{route('admin.levelclass.index')}}">Level Class</a></li>
                                <li><a class="nav-link" href="{{route('admin.department.index')}}">Dapartment</a></li>
                                <li><a class="nav-link" href="layout-transparent.html">Course</a></li>
                                <li><a class="nav-link" href="layout-top-navigation.html">Section</a></li>
                                <li><a class="nav-link" href="layout-top-navigation.html">Lesson</a></li>
                                </ul>
                            </li>
                        @if(auth()->user()->can('roles.index') || auth()->user()->can('permission.index') || auth()->user()->can('users.index'))
                        <li class="menu-header">PENGATURAN</li>
                        @endif
                        <li
                            class="dropdown {{ setActive('admin/role'). setActive('admin/permission'). setActive('admin/user') }}">
                            @if(auth()->user()->can('roles.index') || auth()->user()->can('permission.index') || auth()->user()->can('users.index'))
                                <a href="#" class="nav-link has-dropdown"><i class="fas fa-users"></i><span>Users
                                Management</span></a>
                            @endif
                            
                            <ul class="dropdown-menu">
                                @can('roles.index')
                                    <li class="{{ setActive('admin/role') }}"><a class="nav-link"
                                        href="{{ route('admin.role.index') }}"><i class="fas fa-unlock"></i> Roles</a>
                                </li>
                                @endcan

                                @can('permissions.index')
                                    <li class="{{ setActive('admin/permission') }}"><a class="nav-link"
                                    href="{{ route('admin.permission.index') }}"><i class="fas fa-key"></i>
                                    Permissions</a></li>
                                @endcan

                                @can('users.index')
                                    <li class="{{ setActive('admin/user') }}"><a class="nav-link"
                                        href="{{ route('admin.user.index') }}"><i class="fas fa-users"></i> Users</a>
                                </li>
                                @endcan
                            </ul>
                        </li>
                    </ul>
                </aside>
            </div>

            <!-- Main Content -->
            @yield('content')

            <footer class="main-footer">
                <div class="footer-left">
                    Copyright &copy; 2018 <div class="bullet"></div> Widia Wahyuni <div class="bullet"></div> All Rights
                    Reserved.
                </div>
                <div class="footer-right">

                </div>
            </footer>
        </div>
    </div>

    <!-- General JS Scripts -->
    <script src="{{ asset('assets/admin/modules/popper.js') }}"></script>
    <script src="{{ asset('assets/admin/modules/bootstrap/js/bootstrap.min.js') }}"></script>
    <script src="{{ asset('assets/admin/modules/nicescroll/jquery.nicescroll.min.js') }}"></script>
    <script src="{{ asset('assets/admin/js/stisla.js') }}"></script>
    <script src="{{ asset('assets/admin/modules/select2/dist/js/select2.full.min.js') }}"></script>

    <!-- JS Libraies -->

    <!-- Page Specific JS File -->
    @stack('page-script')
    <!-- Template JS File -->
    <script src="{{ asset('assets/admin/js/scripts.js') }}"></script>
    <script src="{{ asset('assets/admin/js/custom.js') }}"></script>
    <script>
        //active select2
        $(document).ready(function () {
            $('select').select2({
                theme: 'bootstrap4',
                width: 'style',
            });
        });

        //flash message
        @if(session()-> has('success'))
        swal({
            type: "success",
            icon: "success",
            title: "BERHASIL!",
            text: "{{ session('success') }}",
            timer: 1500,
            showConfirmButton: false,
            showCancelButton: false,
            buttons: false,
        });
        @elseif(session()-> has('error'))
        swal({
            type: "error",
            icon: "error",
            title: "GAGAL!",
            text: "{{ session('error') }}",
            timer: 1500,
            showConfirmButton: false,
            showCancelButton: false,
            buttons: false,
        });
        @endif
    </script>
</body>
</html>