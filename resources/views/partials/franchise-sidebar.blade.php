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
                    'franchise.category.index','franchise.category.create','franchise.category.edit',
                    'franchise.employee.salary.index','franchise.employee.salary.create','franchise.employee.salary.edit',
                    'franchise.order.index'
                    ]) }}">
                <a class="nav-link" href="javascript:void(0);" data-toggle="collapse" data-target="#auth_drp">
                    <i class="ion ion-ios-apps"></i>
                    <span class="nav-link-text">Resources</span>
                </a>
                <ul id="auth_drp" class="nav flex-column collapse collapse-level-1">
                    <li class="nav-item">
                        <ul class="nav flex-column">
                            <li class="nav-item">
                                <a class="nav-link" href="javascript:void(0);" data-toggle="collapse"
                                    data-target="#order_drp">
                                    Order
                                </a>
                                <ul id="order_drp" class="nav flex-column collapse collapse-level-2">
                                    <li class="nav-item">
                                        <ul class="nav flex-column">
                                            <li
                                                class="nav-item {{ set_active(['franchise.voucher.index','franchise.voucher.create','franchise.voucher.edit']) }}">
                                                <a class="nav-link"
                                                    href="{{ route('franchise.voucher.index') }}">Voucher</a>
                                            </li>
                                            <li class="nav-item {{ set_active(['franchise.order.index']) }}">
                                                <a class="nav-link"
                                                    href="{{ route('franchise.order.index') }}">Order</a>
                                            </li>
                                        </ul>
                                    </li>
                                </ul>
                            </li>

                            <li class="nav-item">
                                <a class="nav-link" href="javascript:void(0);" data-toggle="collapse"
                                    data-target="#product_drp">
                                    Product
                                </a>
                                <ul id="product_drp" class="nav flex-column collapse collapse-level-2">
                                    <li class="nav-item">
                                        <ul class="nav flex-column">
                                            <li
                                                class="nav-item {{ set_active(['franchise.category.index','franchise.category.create','franchise.category.edit']) }}">
                                                <a class="nav-link"
                                                    href="{{ route('franchise.category.index') }}">Category</a>
                                            </li>
                                            <li
                                                class="nav-item {{ set_active(['franchise.product.index','franchise.product.create','franchise.product.edit']) }}">
                                                <a class="nav-link"
                                                    href="{{ route('franchise.product.index') }}">Product</a>
                                            </li>
                                        </ul>
                                    </li>
                                </ul>
                            </li>

                            <li class="nav-item">
                                <a class="nav-link" href="javascript:void(0);" data-toggle="collapse"
                                    data-target="#stock_drp">
                                    Stock
                                </a>
                                <ul id="stock_drp" class="nav flex-column collapse collapse-level-2">
                                    <li class="nav-item">
                                        <ul class="nav flex-column">

                                            <li
                                                class="nav-item {{ set_active(['franchise.supplier.index','franchise.supplier.create','franchise.supplier.edit']) }}">
                                                <a class="nav-link"
                                                    href="{{ route('franchise.supplier.index') }}">Supplier</a>
                                            </li>
                                            <li
                                                class="nav-item {{ set_active(['franchise.material.index','franchise.material.create','franchise.material.edit']) }}">
                                                <a class="nav-link"
                                                    href="{{ route('franchise.material.index') }}">Material</a>
                                            </li>

                                        </ul>
                                    </li>
                                </ul>
                            </li>

                            <li class="nav-item">
                                <a class="nav-link" href="javascript:void(0);" data-toggle="collapse"
                                    data-target="#employee_drp">
                                    Employee
                                </a>
                                <ul id="employee_drp" class="nav flex-column collapse collapse-level-2">
                                    <li class="nav-item">
                                        <ul class="nav flex-column">



                                            <li
                                                class="nav-item {{ set_active(['franchise.employee.index','franchise.employee.create','franchise.employee.edit']) }}">
                                                <a class="nav-link"
                                                    href="{{ route('franchise.employee.index') }}">Employee</a>
                                            </li>
                                            <li
                                                class="nav-item {{ set_active(['franchise.employee.salary.index','franchise.employee.salary.create','franchise.employee.salary.edit']) }}">
                                                <a class="nav-link"
                                                    href="{{ route('franchise.employee.salary.index') }}">Employee
                                                    Salary</a>
                                            <li class="nav-item {{ set_active(['franchise.employee.report.index']) }}">
                                                <a class="nav-link"
                                                    href="{{ route('franchise.employee.report.index') }}">Employee
                                                    Report</a>
                                        </ul>
                                    </li>
                                </ul>
                            </li>


                    </li>
                </ul>
            </li>

        </ul>
        <li
            class="nav-item {{ set_active(['admin.franchise.type.index','admin.franchise.type.create','admin.franchise.type.index','admin.franchise.index','admin.franchise.create','admin.franchise.index']) }}">
            <a class="nav-link" href="javascript:void(0);" data-toggle="collapse" data-target="#asd">
                <i class="ion ion-ios-apps"></i>
                <span class="nav-link-text">Report </span>
            </a>
            <ul id="asd" class="nav flex-column collapse collapse-level-1">
                <li class="nav-item">
                    <ul class="nav flex-column">

                        <li class="nav-item ">
                            <a class="nav-link" href="{{ route('franchise.report.index') }}">Per Product</a>
                        </li>

                        <li class="nav-item ">
                            <a class="nav-link" href="{{ route('franchise.report.transaction') }}">Transaction</a>
                        </li>

                        <li class="nav-item ">
                            <a class="nav-link" href="{{ route('franchise.report.material') }}">Incoming Material</a>
                        </li>

                    </ul>
                </li>
            </ul>
        </li>


        <li class="nav-item {{ set_active('franchise.setting.index') }}">
            <a class="nav-link" href="{{ route('franchise.setting.index') }}">
                <i class="ion ion-ios-settings"></i>
                <span class="nav-link-text">Account Setting</span>
            </a>
        </li>
        </ul>
    </div>
</div>
