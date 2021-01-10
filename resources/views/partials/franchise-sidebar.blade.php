<div class="nicescroll-bar">
    <div class="navbar-nav-wrap">
        <ul class="navbar-nav flex-column">
            <li class="nav-item {{ set_active('franchise.dashboard') }}">
                <a class="nav-link" href="{{ route('franchise.dashboard') }}">
                    <i class="ion ion-ios-keypad"></i>
                    <span class="nav-link-text">Dashboard</span>
                </a>
            </li>
            <li
                class="nav-item {{ set_active(['franchise.voucher.index','franchise.voucher.create','franchise.voucher.index']) }}">
                <a class="nav-link" href="javascript:void(0);" data-toggle="collapse" data-target="#auth_drp">
                    <i class="ion ion-ios-apps"></i>
                    <span class="nav-link-text">Resources</span>
                </a>
                <ul id="auth_drp" class="nav flex-column collapse collapse-level-1">
                    <li class="nav-item">
                        <ul class="nav flex-column">
                            <li
                                class="nav-item {{ set_active(['franchise.voucher.index','franchise.voucher.create','franchise.voucher.index','franchise.supplier.index','franchise.supplier.create','franchise.supplier.index','franchise.product.index','franchise.product.create','franchise.product.index']) }}">
                                <a class="nav-link" href="{{ route('franchise.voucher.index') }}">Voucher</a>
                            </li>
                            <li
                                class="nav-item {{ set_active(['franchise.supplier.index','franchise.supplier.create','franchise.supplier.index']) }}">
                                <a class="nav-link" href="{{ route('franchise.supplier.index') }}">Supplier</a>
                            </li>
                            <li
                                class="nav-item {{ set_active(['franchise.material.index','franchise.material.create','franchise.material.index']) }}">
                                <a class="nav-link" href="{{ route('franchise.material.index') }}">Material</a>
                            </li>
                            <li
                                class="nav-item {{ set_active(['franchise.product.index','franchise.product.create','franchise.product.index']) }}">
                                <a class="nav-link" href="{{ route('franchise.product.index') }}">Product</a>
                            </li>
                        </ul>
                    </li>
                </ul>
            </li>
        </ul>
    </div>
</div>
