<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Asta App | Maintance</title>
    <!-- favicon CSS -->
    <link rel="icon" type="image/png" sizes="32x32" href="favicon1.png">
    <!-- fonts -->
    <link href="{{ asset('assets_landing') }}/fonts/sfuidisplay.css" rel="stylesheet">
    <!-- Icon fonts -->
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.1/css/all.css">
    <!-- Plugins CSS -->
    <link rel="stylesheet" href="{{ asset('assets_landing') }}/css/plugins.min.css">
    <!-- Style CSS -->
    <link rel="stylesheet" href="{{ asset('assets_landing') }}/css/app.css">
    <!-- Your CSS -->
    <link rel="stylesheet" href="{{ asset('assets_landing') }}/css/custom.css">

</head>

<body class="theme-royal-blue" data-spy="scroll" data-target="#navbar-nav" data-animation="false"
    data-appearance="light">

    <!-- =========== Start of Loader ============ -->
    <div class="preloader">
        <div class="wrapper">
            <div class="blobs">
                <div class="blob-center"></div>
                <div class="blob"></div>
                <div class="blob"></div>
                <div class="blob"></div>
                <div class="blob"></div>
                <div class="blob"></div>
                <div class="blob"></div>
            </div>
            <div>
                <div class="loader-canvas canvas-left"></div>
                <div class="loader-canvas canvas-right"></div>
            </div>
        </div>
    </div>
    <!-- =========== End of Loader ============ -->

    <main class="main hidden">
        <!-- =========== Start of Navigation (main menu) ============ -->
        <header class="navbar navbar-expand-lg navbar-dark">
            <div class="container position-justify">
                <a class="navbar-brand" href="astaapp.com">
                    <img class="navbar-brand__regular" src="{{ asset('assets_landing') }}/img/brand-logo.png"
                        alt="brand-logo">
                </a>
                <!--  End of brand logo -->
                <!-- end of nav CTA button -->
            </div>
            <!-- end of container -->
        </header>
        <!-- =========== End of Navigation (main menu)  ============ -->

        <!-- =========== Start of Body ============ -->
        <section class="space bg-color--primary h-min-100vh d-flex align-items-center">
            <div class="svg-shape--top w-100 opacity--05">
                <img src="{{ asset('assets_landing') }}/img/layout/wave-8.svg" alt="wave" class="svg fill--white">
            </div>
            <!-- end of whole area svg bg -->
            <div class="svg-shape--top opacity--10">
                <img src="{{ asset('assets_landing') }}/img/layout/wave-9.svg" alt="wave" class="svg fill--white">
            </div>
            <!-- end of top right mini svg shape -->

            <div class="container">
                <div class="row ">
                    <div class="col-12 mx-auto color--white text-center mb-4 mb-lg-5">
                        <h1 class="h2-font mb-1">Sorry Page Sedang Diperbaiki</h1>
                        <p class="opacity--60 font-size--20">Tunggu Sampai Kami Selesai Perbaikan</p>
                    </div>
                    <!-- end of col -->
                </div>
                <!-- end of row -->
            </div>
            <!-- end of container -->
        </section>
        <!-- =========== End of Body ============ -->
    </main>
    <script src="{{ asset('assets_landing') }}/js/plugins.min.js"></script>
    <script src="{{ asset('assets_landing') }}/js/app.js"></script>
</body>

</html>
