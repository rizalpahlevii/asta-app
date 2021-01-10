<div class="nicescroll-bar">
    <div class="navbar-nav-wrap">
        <ul class="navbar-nav flex-column">
            <li class="nav-item {{ set_active('franchise.dashboard') }}">
                <a class="nav-link" href="{{ route('franchise.dashboard') }}">
                    <i class="ion ion-ios-keypad"></i>
                    <span class="nav-link-text">Dashboard</span>
                </a>
            </li>
            <li class="nav-item {{ set_active([
                    'franchise.voucher.index','franchise.voucher.create','franchise.voucher.edit',
                    'franchise.supplier.index','franchise.supplier.create','franchise.supplier.edit',
                    'franchise.product.index','franchise.product.create','franchise.product.edit',
                    'franchise.category.index','franchise.category.create','franchise.category.edit'
                    ]) }}">
                <a class="nav-link" href="javascript:void(0);" data-toggle="collapse" data-target="#auth_drp">
                    <i class="ion ion-ios-apps"></i>
                    <span class="nav-link-text">Resources</span>
                </a>
                <ul id="auth_drp" class="nav flex-column collapse collapse-level-1">
                    <li class="nav-item">
                        <ul class="nav flex-column">
                            <li
                                class="nav-item {{ set_active(['franchise.voucher.index','franchise.voucher.create','franchise.voucher.edit']) }}">
                                <a class="nav-link" href="{{ route('franchise.voucher.index') }}">Voucher</a>
                            </li>
                            <li
                                class="nav-item {{ set_active(['franchise.category.index','franchise.category.create','franchise.category.edit']) }}">
                                <a class="nav-link" href="{{ route('franchise.category.index') }}">Category</a>
                            </li>
                            <li
                                class="nav-item {{ set_active(['franchise.supplier.index','franchise.supplier.create','franchise.supplier.edit']) }}">
                                <a class="nav-link" href="{{ route('franchise.supplier.index') }}">Supplier</a>
                            </li>
                            <li
                                class="nav-item {{ set_active(['franchise.material.index','franchise.material.create','franchise.material.edit']) }}">
                                <a class="nav-link" href="{{ route('franchise.material.index') }}">Material</a>
                            </li>
                            <li
                                class="nav-item {{ set_active(['franchise.product.index','franchise.product.create','franchise.product.edit']) }}">
                                <a class="nav-link" href="{{ route('franchise.product.index') }}">Product</a>
                            </li>
                            <li
                                class="nav-item {{ set_active(['franchise.employee.index','franchise.employee.create','franchise.employee.edit']) }}">
                                <a class="nav-link" href="{{ route('franchise.employee.index') }}">Employee</a>
                            </li>
                        </ul>
                    </li>
                </ul>
            </li>
        </ul>
    </div>
</div>
