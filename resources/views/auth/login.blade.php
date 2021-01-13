<!DOCTYPE html>
<!--
Template Name: Deepor - Responsive Bootstrap 4 Admin Dashboard Template
Author: Hencework

License: You must have a valid license purchased only from templatemonster to legally use the template for your project.
-->
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" />
    <title>Deepor I Login</title>
    <meta name="description" content="A responsive bootstrap 4 admin dashboard template by hencework" />

    <!-- Favicon -->
    <link rel="shortcut icon" href="favicon.ico">
    <link rel="icon" href="favicon.ico" type="image/x-icon">

    <!-- Toggles CSS -->
    <link href="{{ asset('admin_template') }}/vendors/jquery-toggles/css/toggles.css" rel="stylesheet" type="text/css">
    <link href="{{ asset('admin_template') }}/vendors/jquery-toggles/css/themes/toggles-light.css" rel="stylesheet"
        type="text/css">

    <!-- Custom CSS -->
    <link href="{{ asset('admin_template') }}/dist/css/style.css" rel="stylesheet" type="text/css">
</head>

<body>


    <!-- HK Wrapper -->
    <div class="hk-wrapper">

        <!-- Main Content -->
        <div class="hk-pg-wrapper hk-auth-wrapper">

            <div class="container-fluid">
                <div class="row">
                    <div class="col-xl-12 pa-0">
                        <div class="auth-form-wrap pt-xl-0 pt-70">
                            <div class="auth-form w-xl-30 w-lg-55 w-sm-75 w-100">
                                <a class="d-flex auth-brand align-items-center justify-content-center  mb-20" href="#">
                                    <img class="brand-img d-inline-block mr-5"
                                        src="{{ asset('admin_template') }}/asta-app.png" alt="brand" />
                                </a>
                                <form method="POST" action="{{ route('login') }}">
                                    @csrf
                                    <p class="text-center mb-30">Sign in to your account </p>
                                    <!-- Session Status -->

                                    <!-- Validation Errors -->
                                    @if ($errors->any())
                                    <ul class="alert alert-danger">
                                        @foreach ($errors->all() as $item)
                                        <li>{{ $item }}</li>
                                        @endforeach
                                    </ul>
                                    @endif
                                    @if (session('status'))
                                    <div class="alert alert-inv alert-inv-danger alert-wth-icon" role="alert">
                                        <span class="alert-icon-wrap">
                                            <i class="zmdi zmdi-block"></i>
                                        </span>
                                        {{ session('status') }}
                                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                            <span aria-hidden="true">×</span>
                                        </button>
                                    </div>
                                    @endif
                                    <div class="form-group">
                                        <input class="form-control" placeholder="Username" type="text" name="username"
                                            id="username">
                                    </div>
                                    <div class="form-group">
                                        <div class="form-group">
                                            <input class="form-control" placeholder="Password" type="password"
                                                name="password" id="password">

                                        </div>
                                    </div>

                                    <button class="btn btn-warning btn-block" type="submit">Login</button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- /Main Content -->

    </div>
    <!-- /HK Wrapper -->

    <!-- JavaScript -->

    <!-- jQuery -->
    <script src="{{ asset('admin_template') }}/vendors/jquery/dist/jquery.min.js"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="{{ asset('admin_template') }}/vendors/popper.js/dist/umd/popper.min.js"></script>
    <script src="{{ asset('admin_template') }}/vendors/bootstrap/dist/js/bootstrap.min.js"></script>

    <!-- Slimscroll JavaScript -->
    <script src="{{ asset('admin_template') }}/dist/js/jquery.slimscroll.js"></script>

    <!-- Fancy Dropdown JS -->
    <script src="{{ asset('admin_template') }}/dist/js/dropdown-bootstrap-extended.js"></script>

    <!-- FeatherIcons JavaScript -->
    <script src="{{ asset('admin_template') }}/dist/js/feather.min.js"></script>

    <!-- Init JavaScript -->
    <script src="{{ asset('admin_template') }}/dist/js/init.js"></script>
</body>

</html>
