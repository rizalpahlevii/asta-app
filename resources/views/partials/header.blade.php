<nav class="navbar navbar-expand-xl navbar-light fixed-top hk-navbar">
    <a id="navbar_toggle_btn" class="navbar-toggle-btn nav-link-hover" href="javascript:void(0);"><i
            class="ion ion-ios-menu"></i></a>
    <a class="navbar-brand" href="">
        <img class="brand-img d-inline-block mr-5" src="{{ asset('admin_template') }}/dist/img/logo.png"
            alt="brand" />Deepor
    </a>
    <ul class="navbar-nav hk-navbar-content">
        <li class="nav-item">
            <a id="navbar_search_btn" class="nav-link nav-link-hover" href="javascript:void(0);"><i
                    class="ion ion-ios-search"></i></a>
        </li>
        <li class="nav-item">
            <a id="settings_toggle_btn" class="nav-link nav-link-hover" href="javascript:void(0);"><i
                    class="ion ion-ios-settings"></i></a>
        </li>

        <li class="nav-item dropdown dropdown-authentication">
            <a class="nav-link dropdown-toggle no-caret" href="#" role="button" data-toggle="dropdown"
                aria-haspopup="true" aria-expanded="false">
                <div class="media">
                    <div class="media-img-wrap">
                        <div class="avatar">
                            <img src="{{ asset('admin_template') }}/dist/img/avatar10.jpg" alt="user"
                                class="avatar-img rounded-circle">
                        </div>
                        <span class="badge badge-success badge-indicator"></span>
                    </div>
                    <div class="media-body">
                        <span>{{ auth()->user()->name }}<i class="zmdi zmdi-chevron-down"></i></span>
                    </div>
                </div>
            </a>
            <div class="dropdown-menu dropdown-menu-right" data-dropdown-in="flipInX" data-dropdown-out="flipOutX">
                <a class="dropdown-item" href="profile.html"><i
                        class="dropdown-icon zmdi zmdi-account"></i><span>Profile</span></a>
                <a class="dropdown-item" href="#"><i class="dropdown-icon zmdi zmdi-card"></i><span>My
                        balance</span></a>
                <a class="dropdown-item" href="inbox.html"><i
                        class="dropdown-icon zmdi zmdi-email"></i><span>Inbox</span></a>
                <a class="dropdown-item" href="#"><i
                        class="dropdown-icon zmdi zmdi-settings"></i><span>Settings</span></a>
                <div class="dropdown-divider"></div>
                <div class="sub-dropdown-menu show-on-hover">
                    <a href="#" class="dropdown-toggle dropdown-item no-caret"><i
                            class="zmdi zmdi-check text-success"></i>Online</a>
                    <div class="dropdown-menu open-left-side">
                        <a class="dropdown-item" href="#"><i
                                class="dropdown-icon zmdi zmdi-check text-success"></i><span>Online</span></a>
                        <a class="dropdown-item" href="#"><i
                                class="dropdown-icon zmdi zmdi-circle-o text-warning"></i><span>Busy</span></a>
                        <a class="dropdown-item" href="#"><i
                                class="dropdown-icon zmdi zmdi-minus-circle-outline text-danger"></i><span>Offline</span></a>
                    </div>
                </div>
                <div class="dropdown-divider"></div>
                <form method="POST" action="{{ route('logout') }}">
                    @csrf
                    <a class="dropdown-item" href="{{ route('logout') }}" onclick="event.preventDefault();
                this.closest('form').submit();"><i class="dropdown-icon zmdi zmdi-power"></i><span>Log
                            out</span></a>

                </form>
            </div>
        </li>
    </ul>
</nav>
