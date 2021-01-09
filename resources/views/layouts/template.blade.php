<!DOCTYPE html>

<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" />
    <title>{{ config('app.name') }} - @yield('page')</title>

    <!-- Favicon -->
    <link rel="shortcut icon" href="favicon.ico">
    <link rel="icon" href="favicon.ico" type="image/x-icon">
    @include('partials.css')
</head>

<body>


    <!-- HK Wrapper -->
    <div class="hk-wrapper hk-vertical-nav">

        <!-- Top Navbar -->
        @include('partials.header')
        <form role="search" class="navbar-search">
            <div class="position-relative">
                <a href="javascript:void(0);" class="navbar-search-icon"><i class="ion ion-ios-search"></i></a>
                <input type="text" name="example-input1-group2" class="form-control" placeholder="Type here to Search">
                <a id="navbar_search_close" class="navbar-search-close" href="#"><i class="ion ion-ios-close"></i></a>
            </div>
        </form>
        <!-- /Top Navbar -->

        <!-- Vertical Nav -->
        <nav class="hk-nav hk-nav-light">
            <a href="javascript:void(0);" id="hk_nav_close" class="hk-nav-close"><span class="feather-icon"><i
                        data-feather="x"></i></span></a>
            @if (auth()->user()->franchise)
            @include('partials.franchise-sidebar')
            @else
            @include('partials.admin-sidebar')
            @endif
        </nav>
        <div id="hk_nav_backdrop" class="hk-nav-backdrop"></div>
        <!-- /Vertical Nav -->

        <!-- Setting Panel -->
        <div class="hk-settings-panel">
            <div class="nicescroll-bar position-relative">
                <div class="settings-panel-wrap">
                    <div class="settings-panel-head mb-15">
                        <a href="javascript:void(0);" id="settings_panel_close" class="settings-panel-close"><span
                                class="feather-icon"><i data-feather="x"></i></span></a>
                    </div>

                    <h6 class="mb-5">Navigation</h6>
                    <p class="font-14">Menu comes in two modes: dark & light</p>
                    <div class="button-list hk-nav-select mb-10">
                        <button type="button" id="nav_light_select"
                            class="btn btn-outline-primary btn-sm btn-wth-icon icon-wthot-bg"><span
                                class="icon-label"><i class="fa fa-sun-o"></i> </span><span class="btn-text">Light
                                Mode</span></button>
                        <button type="button" id="nav_dark_select"
                            class="btn btn-outline-light btn-sm btn-wth-icon icon-wthot-bg"><span class="icon-label"><i
                                    class="fa fa-moon-o"></i> </span><span class="btn-text">Dark Mode</span></button>
                    </div>
                    <hr>
                    <h6 class="mb-5">Top Nav</h6>
                    <p class="font-14">Choose your liked color mode</p>
                    <div class="button-list hk-navbar-select mb-10">
                        <button type="button" id="navtop_light_select"
                            class="btn btn-outline-light btn-sm btn-wth-icon icon-wthot-bg"><span class="icon-label"><i
                                    class="fa fa-sun-o"></i> </span><span class="btn-text">Light Mode</span></button>
                        <button type="button" id="navtop_dark_select"
                            class="btn btn-outline-primary btn-sm btn-wth-icon icon-wthot-bg"><span
                                class="icon-label"><i class="fa fa-moon-o"></i> </span><span class="btn-text">Dark
                                Mode</span></button>
                    </div>
                    <hr>
                    <div class="d-flex justify-content-between align-items-center">
                        <h6>Scrollable Header</h6>
                        <div class="toggle toggle-sm toggle-simple toggle-light toggle-bg-primary scroll-nav-switch">
                        </div>
                    </div>
                    <button id="reset_settings" class="btn btn-primary btn-block btn-reset mt-30">Reset</button>
                </div>
            </div>
        </div>
        <!-- /Setting Panel -->

        <!-- Main Content -->
        <div class="hk-pg-wrapper">
            <nav class="hk-breadcrumb" aria-label="breadcrumb">
                <ol class="breadcrumb breadcrumb-light bg-transparent">
                    <li class="breadcrumb-item"><a href="#">ASTA APP</a></li>
                    <li class="breadcrumb-item active" aria-current="page">@yield('page')</li>
                </ol>
            </nav>

            <div class="container-fluid  mt-sm-30 mt-15">
                @if (Session::has('type'))
                <div class="alert alert-inv alert-inv-{{ Session::get('type') }} alert-wth-icon alert-dismissible fade show"
                    role="alert">
                    <span class="alert-icon-wrap">
                        <i class="{{Session::get('icon')}}"></i>
                    </span>
                    {{Session::get('message')}}
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                @endif
                @yield('content')
            </div>

            <div class="hk-footer-wrap container">
                @include('partials.footer')
            </div>
            <!-- /Footer -->
        </div>
        <!-- /Main Content -->

    </div>
    <!-- /HK Wrapper -->
    @include('partials.js')
    @stack('script')
</body>

</html>
