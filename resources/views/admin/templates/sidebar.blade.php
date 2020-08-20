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
            <li class="dropdown {{ setActive('admin/role'). setActive('admin/permission'). setActive('admin/user') }}">
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