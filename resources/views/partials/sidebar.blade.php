<div class="nicescroll-bar">
    <div class="navbar-nav-wrap">
        <ul class="navbar-nav flex-column">
            <li class="nav-item {{ set_active('admin.dashboard') }}">
                <a class="nav-link" href="{{ route('admin.dashboard') }}">
                    <i class="ion ion-ios-keypad"></i>
                    <span class="nav-link-text">Dashboard</span>
                </a>
            </li>

            <li
                class="nav-item {{ set_active(['admin.franchise.type.index','admin.franchise.type.create','admin.franchise.type.index','admin.franchise.index','admin.franchise.create','admin.franchise.index']) }}">
                <a class="nav-link" href="javascript:void(0);" data-toggle="collapse" data-target="#auth_drp">
                    <i class="ion ion-ios-apps"></i>
                    <span class="nav-link-text">Franchise Data</span>
                </a>
                <ul id="auth_drp" class="nav flex-column collapse collapse-level-1">
                    <li class="nav-item">
                        <ul class="nav flex-column">

                            <li
                                class="nav-item {{ set_active(['admin.franchise.index','admin.franchise.create','admin.franchise.index']) }}">
                                <a class="nav-link" href="{{ route('admin.franchise.index') }}">Franchise</a>
                            </li>
                            <li
                                class="nav-item {{ set_active(['admin.franchise.type.index','admin.franchise.type.create','admin.franchise.type.index']) }}">
                                <a class="nav-link" href="{{ route('admin.franchise.type.index') }}">Franchise Type</a>
                            </li>
                        </ul>
                    </li>
                </ul>
            </li>
            <li class="nav-item {{ set_active(['admin.user.index','admin.user.create','admin.user.edit']) }}">
                <a class="nav-link" href="{{ route('admin.user.index') }}">
                    <i class="ion ion-ios-person"></i>
                    <span class="nav-link-text">User</span>
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="javascript:void(0);">
                    <i class="ion ion-ios-archive"></i>
                    <span class="nav-link-text">Suplier</span>
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="javascript:void(0);">
                    <i class="ion ion-ios-settings"></i>
                    <span class="nav-link-text">Setting</span>
                </a>
            </li>
        </ul>

    </div>
</div>
