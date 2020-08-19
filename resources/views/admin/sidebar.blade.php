<!-- Main Sidebar Container -->
<aside class="main-sidebar sidebar-dark-primary elevation-4">
  <!-- Brand Logo -->
  <a href="#" class="brand-link elevation-4">
    <img src="/assets/adminlte30/dist/img/AdminLTELogo.png" alt="Taman Kreasi" class="brand-image img-circle elevation-3"
         alt="Logo"
         class="brand-image img-circle elevation-3"
         style="opacity: .8">
    <span class="brand-text font-weight-light">SMK Taman Kreasi</span>
  </a>

  <!-- Sidebar -->
  <div class="sidebar">
    <!-- Sidebar user (optional) -->
    <div class="user-panel mt-3 pb-3 mb-3 d-flex">
      <div class="image">
        <img src="/assets/adminlte30/dist/img/user2-160x160.jpg" class="img-circle elevation-2" alt="User Image">
      </div>
      <div class="info">
        <a href="{{ route('home') }}" class="d-block">{{ auth()->user()->name }}</a>
      </div>
    </div>

    <!-- Sidebar Menu -->
    <nav class="mt-2">
      <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
        <!-- Add icons to the links using the .nav-icon class
             with font-awesome or any other icon font library -->
        <li class="nav-item {{ setActive('admin/dashboard') }}">
          <a href="{{ route('admin.dashboard.index') }}" class="nav-link">
            <i class="nav-icon fas fa-tachometer-alt"></i>
            <p>
              Dashboard
            </p>
          </a>
        </li>
        @can('posts.index')
        <li class="nav-item {{ setActive('admin/post') }}">
          <a href="#" class="nav-link">
            <i class="nav-icon fas fa-book-open"></i>
            <p>
              Berita
            </p>
          </a>
        </li>
        @endcan
        @can('tags.index')
        <li class="nav-item {{ setActive('admin/tag') }}"><a class="nav-link"
                href="#"><i class="nav-icon fas fa-tags"></i> <span>Tags</span></a>
        </li>
        @endcan

        @can('categories.index')
        <li class="nav-item {{ setActive('admin/category') }}"><a class="nav-link"
                href="#"><i class="nav-icon fas fa-folder"></i>
                <span>Kategori</span></a></li>
        @endcan

        @can('events.index')
        <li class="nav-item {{ setActive('admin/event') }}"><a class="nav-link"
                href="#"><i class="nav-icon fas fa-bell"></i>
                <span>Agenda</span></a></li>
        @endcan

        @if(auth()->user()->can('photos.index') || auth()->user()->can('videos.index'))
        <li class="nav-header">GALERI</li>
        @endif
        
        @can('photos.index')
        <li class="nav-item {{ setActive('admin/photo') }}"><a class="nav-link"
                href="#"><i class="nav-icon fas fa-image"></i>
                <span>Foto</span></a></li>
        @endcan

        @can('videos.index')
        <li class="nav-item {{ setActive('admin/video') }}"><a class="nav-link"
                href="#"><i class="nav-icon fas fa-video"></i>
                <span>Video</span></a></li>
        @endcan

        @if(auth()->user()->can('roles.index') || auth()->user()->can('permission.index') || auth()->user()->can('users.index'))
        <li class="nav-header">PENGATURAN</li>
        @endif
        
        @can('sliders.index')
        
        <li class="nav-item {{ setActive('admin/slider') }}"><a class="nav-link"
                href="#"><i class="nav-icon fas fa-laptop"></i>
                <span>Sliders</span></a></li>
        @endcan
        <li class="nav-item has-treeview menu-open {{ setActive('admin/role'). setActive('admin/permission'). setActive('admin/user') }}">
          @if(auth()->user()->can('roles.index') || auth()->user()->can('permission.index') || auth()->user()->can('users.index'))
          <a href="#" class="nav-link active">
            <i class="nav-icon fas fa-users"></i>
            <p>
              Users Management
            </p>
          </a>
          @endif

            <ul class="nav nav-treeview">
                @can('roles.index')
                    <li class="nav-item {{ setActive('admin/role') }}"><a class="nav-link"
                        href="{{ route('admin.role.index') }}"><i class="nav-icon fas fa-unlock"></i> Roles</a>
                </li>
                @endcan

                @can('permissions.index')
                    <li class="nav-item {{ setActive('admin/permission') }}"><a class="nav-link"
                    href="{{ route('admin.permission.index') }}"><i class="nav-icon fas fa-key"></i>
                    Permissions</a></li>
                @endcan

                @can('users.index')
                    <li class="nav-item {{ setActive('admin/user') }}"><a class="nav-link"
                        href="#"><i class="nav-icon fas fa-users"></i> Users</a>
                </li>
                @endcan
            </ul>
        </li>
      </ul>
    </nav>
    <!-- /.sidebar-menu -->
  </div>
  <!-- /.sidebar -->
</aside>