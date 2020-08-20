<div class="navbar-bg"></div>
            <nav class="navbar navbar-expand-lg main-navbar">
                <form class="form-inline mr-auto">
                    <ul class="navbar-nav mr-3">
                        <li><a href="#" data-toggle="sidebar" class="nav-link nav-link-lg"><i
                                    class="fas fa-bars"></i></a></li>
                    </ul>
                </form>
                <ul class="navbar-nav navbar-right">
                    <li class="dropdown"><a href="#" data-toggle="dropdown" class="nav-link dropdown-toggle nav-link-lg nav-link-user">
                        <img alt="image" src="{{ asset('assets/admin/img/avatar/avatar-1.png') }}"
                        class="rounded-circle mr-1">
                        <div class="d-sm-none d-lg-inline-block">Hi, {{ auth()->user()->name }}</div></a>
                        <div class="dropdown-menu dropdown-menu-right">
                          <div class="dropdown-title">Logged in 5 min ago</div>
                          <a href="features-profile.html" class="dropdown-item has-icon">
                            <i class="far fa-user"></i> Profile
                          </a>
                          <a href="features-activities.html" class="dropdown-item has-icon">
                            <i class="fas fa-bolt"></i> Activities
                          </a>
                          <a href="features-settings.html" class="dropdown-item has-icon">
                            <i class="fas fa-cog"></i> Settings
                          </a>
                          <a href="{{ route('root') }}" class="dropdown-item has-icon" target="_blank">
                            <i class="fa fa-external-link-alt"></i> View Site
                          </a>
                          <div class="dropdown-divider"></div>
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