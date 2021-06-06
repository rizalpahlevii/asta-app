<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Asta App | Penyedia Layanan ERP Untuk Penjualan</title>
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

<body class="theme-royal-blue" data-spy="scroll" data-target="#navbar-nav" data-animation="true"
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

    <main class="main">
        <!-- =========== Start of Navigation (main menu) ============ -->
        <header class="navbar navbar-sticky sticky-bg-color--primary navbar-expand-lg navbar-dark">
            <div class="container position-relative">
                <a class="navbar-brand" href="astaapp.com">
                    <img class="navbar-brand__regular" src="{{ asset('assets_landing') }}/img/brand-logo.png"
                        alt="brand-logo">
                    <img class="navbar-brand__sticky" src="{{ asset('assets_landing') }}/img/brand-logo.png"
                        alt="sticky brand-logo">
                </a>
                <!--  End of brand logo -->
                <button class="navbar-toggler d-lg-none" type="button" data-toggle="navbarToggler"
                    aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <!-- end of Nav toggler -->

                <div class="navbar-inner ml-lg-auto pl-lg-2 pl-xl-6">
                    <!--  Nav close button inside off-canvas/ mobile menu -->
                    <button class="navbar-toggler d-lg-none" type="button" data-toggle="navbarToggler"
                        aria-label="Toggle navigation">
                        <span class="navbar-toggler-icon"></span>
                    </button>
                    <!-- end of Nav Toggoler -->
                    <nav>
                        <ul class="navbar-nav" id="navbar-nav">
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('index') }}">Home</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('about') }}">Tentang Kami</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="https://wa.me/6282300120168">Kontak</a>
                            </li>

                        </ul>
                        <!-- end of nav menu items -->
                    </nav>

                </div>
                <div class="mr-5 mr-lg-0 ml-lg-2">
                    <a href="{{ route('login') }}"
                        class="btn btn-size--sm btn-border btn-hover--splash color--white"><span
                            class="btn__text font-w--500">Login</span></a>
                </div>
                <!-- end of nav CTA button -->
            </div>
            <!-- end of container -->
        </header>
        <!-- =========== End of Navigation (main menu)  ============ -->

        <!-- =========== Start of Hero ============ -->
        <section class="hero hero--full hero--v9 bg-color--primary d-flex align-items-center hidden">
            <div class="canvas-lines opacity--10">
                <span></span>
                <span></span>
                <span></span>
                <span></span>
            </div>
            <!-- end of canvas lines -->
            <div class="container">
                <div class="row flex-column-reverse flex-lg-row">
                    <div class="col-12 col-md-10 col-lg-7 mx-auto mx-lg-0 text-center text-lg-left z-index2">
                        <div class="hero-content reveal">
                            <h1 class="hero__title mb-2 mb-lg-3">Atur aplikasi ERP Untuk Franchise lebih mudah
                                <br> dengan Asta App</h1>
                            <p class="hero__description font-size--20 mb-3 mb-lg-5 pr-xl-10">Kami membantu bisnis Anda
                                mempercepat proses penjualan dengan aplikasi ERP Asta App</p>
                            <!-- end of text content -->
                            <a href="#" class="btn btn-bg--cta--3 btn-hover--3d">
                                <span class="btn__text"> Coba Asta App Sekarang </span>
                            </a>
                            <!-- end of button -->
                        </div>
                        <!-- end of content -->

                    </div>
                    <!-- end of col -->
                    <div
                        class="col-12 col-lg-6 mt-6 mt-lg-0 mb-2 mb-lg-0 pl-lg-4 pos-abs-lg-vertical-center pos-right hero__image">
                        <picture><img src="{{ asset('assets_landing') }}/img/gambar1.png" alt="media-thumb"
                                class="img-fluid"></picture>
                    </div>
                    <!-- end of col -->
                </div>
                <!-- end of row -->
            </div>
        </section>
        <!-- =========== End of Hero ============ -->

        <!-- =========== Start of Core Features ============ -->
        <section class="bg-color--primary features features--v1 pt-10 pb-5 hidden" id="features">
            <div class="canvas-lines opacity--10">
                <span></span>
                <span></span>
                <span></span>
                <span></span>
            </div>
            <!-- end of canvas lines -->
            <div class="container">
                <div class="row">
                    <div class="col-12 col-md-10 col-lg-5">
                        <div class="section-title mb-5 mb-lg-7 text-center text-md-left reveal">
                            <h2 class="h3-font">Rasakan Firtur-Firtur <br>Mudah Digunakan <br> Di Asta App.
                            </h2>
                        </div>
                    </div>
                </div>
                <!-- end of section title row -->
                <div class="row">
                    <div class="col-12">
                        <div class="masks">
                            <div class="mask mask--top z-index2 jsElement bg-color--primary" data-height="50%"></div>
                            <div class="mask mask--bottom z-index3 bg-color--primary-light--1 jsElement"
                                data-height="72.7%"></div>
                            <div class="mask mask--full bg-color--primary-light--1 jsElement" data-height="72.7%"></div>

                            <!-- INSTRUCTION:
                            //     This section is technically a complicated section due to limitation of the carousel slider. We created two divs to mask the left side where the first div contains the bg color of the previous/ overlapped section and the second and third one is light blue. If you use a different bg color on the previous/ overlapped section you need to add "data-bg-color="COLOR VALUE OF PREVIOUS SECTION BG COLOR" attribute to the first div. And gradient color might not work well.
                            -->
                        </div>
                        <!-- end of mask -->

                        <div class="carosuel-slider--v3 card--v3 z-index1">
                            <div class="slide">
                                <div class="card bg-color--primary rounded--05 box-shadow--6 px-3 pt-5 pb-3">
                                    <div class="card-body">
                                        <span class="font-size--60 mb-2 color--white">
                                            <i class="icon icon-contacts"></i>
                                        </span>
                                        <h3 class="font-size--30 font-w--700 mb-2"><a href="#"
                                                class="color--white">Proses <br> Order</a></h3>

                                        <p class="mb-3 font-size--20 opacity--80"> Atur Kasir Lebih Mudah Dengan Asta
                                            App Dengan Tambahan Firtur Voucher</p>
                                    </div>
                                </div>
                            </div>
                            <!-- end of single slide -->
                            <div class="slide active">
                                <div class="card bg-color--primary rounded--05 box-shadow--6 px-3 pt-5 pb-3">
                                    <div class="card-body">
                                        <span class="font-size--60 mb-2 color--white">
                                            <i class="icon icon-tool-blur"></i>
                                        </span>
                                        <h3 class="font-size--30 font-w--700 mb-2"><a href="#" class="color--white">Atur
                                                <br> Produk</a></h3>

                                        <p class="mb-3 font-size--20 opacity--80">Dengan Mengatur Produk Sama Saja
                                            Mencatat Sebuah Menu Didalam Aplikasi Sehingga Menu Tercatat Dengan Rapi</p>
                                    </div>
                                </div>
                            </div>
                            <!-- end of single slide -->
                            <div class="slide">
                                <div class="card bg-color--primary rounded--05 box-shadow--6 px-3 pt-5 pb-3">
                                    <div class="card-body">
                                        <span class="font-size--60 mb-2 color--white">
                                            <i class="icon icon-meeting"></i>
                                        </span>
                                        <h3 class="font-size--30 font-w--700 mb-2"><a href="#"
                                                class="color--white">Management <br> Karyawan</a></h3>

                                        <p class="mb-3 font-size--20 opacity--80">Terdapat Firtur Pengaturan Pegawai
                                            Dengan Mengatur Gaji Dan Pencatatan Pegawai</p>
                                    </div>
                                </div>
                            </div>
                            <!-- end of single slide -->

                            <div class="slide">
                                <div class="card bg-color--primary rounded--05 box-shadow--6 px-3 pt-5 pb-3">
                                    <div class="card-body">
                                        <span class="font-size--60 mb-2 color--white">
                                            <i class="icon icon-app-store"></i>
                                        </span>
                                        <h3 class="font-size--30 font-w--700 mb-2"><a href="#"
                                                class="color--white">Supplier & <br> Bahan Baku</a></h3>

                                        <p class="mb-3 font-size--20 opacity--80">Di Asta App Terdapat Pencatatan
                                            Supplier & Bahan Baku Pembuatan Produk Sehingga Bahan Baku Tercatat</p>
                                    </div>
                                </div>
                            </div>
                            <!-- end of single slide -->
                            <div class="slide">
                                <div class="card bg-color--primary rounded--05 box-shadow--6 px-3 pt-5 pb-3">
                                    <div class="card-body">
                                        <span class="font-size--60 mb-2 color--white">
                                            <i class="icon icon-handshake"></i>
                                        </span>
                                        <h3 class="font-size--30 font-w--700 mb-2"><a href="#"
                                                class="color--white">Laporan</a></h3>

                                        <p class="mb-3 font-size--20 opacity--80">Firtur Laporan Mempermudahkan Kita
                                            Dalam Mencatat Pemasukan Di dalam yang bisa diakses dimana saja & kapan sja
                                        </p>
                                    </div>
                                    <div class="card-footer">
                                        <a href="#" class="font-size--26 color--white"><i
                                                class="icon icon-arrow-right"></i></a>
                                    </div>
                                </div>
                            </div>
                            <!-- end of single slide -->
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- =========== End of Core Features ============ -->

        <!-- =========== Start of Testimonial ============ -->
        <section class="space--bottom pt-5 pt-lg-9 bg-color--primary-light--1 testimonials testimonials--v2">
            <div class="container">
                <div class="row">
                    <div class="col-12 col-md-10 mx-auto reveal">
                        <div
                            class="testimonials__pattern background-holder background--auto background--top--left opacity--40">
                            <img src="{{ asset('assets_landing') }}/img/layout/vertical-pattern-1.png" alt="wave"
                                class="background-image-holder">
                        </div>
                        <!-- end of background -->
                        <div class="carosuel-slider--v7 testimonial bg-white border--around rounded--10">
                            <div class="slide">
                                <div class="d-md-flex p-3 py-lg-5 pl-lg-4 pr-lg-10">
                                    <span class="testimonial__quote color--coral mr-3"><i
                                            class="icon icon-quote"></i></span>
                                    <div>
                                        <blockquote class="blockquote mb-3">Aplikasi ERP Asta App stabil untuk diakses
                                            kapan & dimana saja, mudah untuk mengecek laporan penjualan, menariknya saya
                                            dapat melihat stok dan bahan baku
                                            terima kasih Asta App</blockquote>
                                        <div class="d-flex align-items-center">
                                            <span class="mr-2"><img src="{{ asset('assets_landing') }}/img/avatar-1.png"
                                                    alt="avatar"></span>
                                            <div class="d-flex flex-column">
                                                <span class="client-name font-size--17 font-w--600">Nasrul
                                                    Khowatari</span>
                                                <span>Pemilik Franchise Minuman</span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- end of single item -->
                            <div class="slide">
                                <div class="d-md-flex p-3 py-lg-5 pl-lg-4 pr-lg-10">
                                    <span class="testimonial__quote color--coral mr-3"><i
                                            class="icon icon-quote"></i></span>
                                    <div>
                                        <blockquote class="blockquote mb-3">Terima kasih Asta App dengan aplikasi saya
                                            tidak report report lagi harus mencatat keuangan didalam buku apalagi
                                            menambahkan produk baru
                                            dan saya juga dapat mengakses pemasukan di luar kota sekalipun</blockquote>
                                        <div class="d-flex align-items-center">
                                            <span class="mr-2"><img src="{{ asset('assets_landing') }}/img/avatar-2.png"
                                                    alt="avatar"></span>
                                            <div class="d-flex flex-column">
                                                <span class="client-name font-size--17 font-w--600">Fahrul Gofar</span>
                                                <span>Pemilik Franchise Minuman</span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- end of single item -->
                            <div class="slide">
                                <div class="d-md-flex p-3 py-lg-5 pl-lg-4 pr-lg-10">
                                    <span class="testimonial__quote color--coral mr-3"><i
                                            class="icon icon-quote"></i></span>
                                    <div>
                                        <blockquote class="blockquote mb-3">Ini Solusi Digital Terbaru penggunaan
                                            aplikasi yang langsung gampang saya pahami padahal saya agak gaptek tentang
                                            aplikasi
                                            Terima Kasih Asta App Semoga Semakin Maju </blockquote>
                                        <div class="d-flex align-items-center">
                                            <span class="mr-2"><img src="{{ asset('assets_landing') }}/img/avatar-3.png"
                                                    alt="avatar"></span>
                                            <div class="d-flex flex-column">
                                                <span class="client-name font-size--17 font-w--600">Andre Asyari</span>
                                                <span>Kasir di Franchise Minuman</span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- end of single item -->
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- =========== End of Testimonial ============ -->

        <!-- =========== Start of Intro Video ============ -->
        <section class="space--bottom pt-7 pt-md-3 pt-lg-0 bg-color--primary-light--1 intro-video--v1">
            <div class="svg-shape ">
                <img src="{{ asset('assets_landing') }}/img/layout/wave-5.svg" alt="wave" class="svg">
            </div>
            <div class="container">
                <div class="row position-relative reveal">
                    <div class="about-video__pattern background-holder background--top--right opacity--50">
                        <img src="{{ asset('assets_landing') }}/img/layout/vertical-pattern-1.svg" alt="dots-pattern"
                            class="background-image-holder">
                    </div>
                    <!-- end of background -->
                    <div class="col-12 col-lg-9">
                        <div
                            class="bg-color--primary text-center text-lg-left p-5 p-lg-8 box-shadow--2 position-relative z-index1">
                            <div class="background-holder background--cover background--left z-index-1">
                                <img src="{{ asset('assets_landing') }}/img/layout/video-bg-1.png" alt="wave"
                                    class="background-image-holder">
                            </div>
                            <!-- end of background -->
                            <h2>Mari Rasakan<br> Sentuhan<br> Asta App</h2>
                        </div>
                    </div>
                    <div class="col-12 col-lg-7 col-xl-8 ml-auto about-video-media">
                        <picture><img src="{{ asset('assets_landing') }}/img/gambar2.png" alt="media-thumb"
                                class="img-fluid box-shadow--2"></picture>
                    </div>
                </div>
            </div>
        </section>
        <!-- =========== End of Intro Video ============ -->

        <!-- =========== Start of Content Block ============ -->
        <section class="space" id="why">
            <div class="container">
                <div class="row space--bottom flex-column-reverse flex-lg-row align-items-center text-center">
                    <div class="col-12 col-md-10 col-lg-6 text-lg-left reveal">
                        <h2 class="mb-3">Catatan pembayaran Anda berantakan?</h2>
                        <p class="mb-5">Aplikasi ERP Asta App menyederhanakan proses penjualan usaha Anda dan mengelola
                            transaksi lebih efisien.</p>

                        <a href="#" class="btn btn-bg--cta--3">
                            <span class="btn__text d-flex align-items-center"> Hubungi Kami Untuk Demo Aplikasi
                            </span>
                        </a>
                    </div>
                    <!-- end of content col -->
                    <div class="col-12 col-lg-6 mb-3 mb-lg-0">
                        <picture>
                            <img class="img-fluid" src="{{ asset('assets_landing') }}/img/gambar3.png"
                                alt="illustration">
                        </picture>
                    </div>
                    <!-- enf of image col -->
                </div>
                <!--== end of content block 1 row ==-->

                <div class="row flex-column-reverse flex-lg-row-reverse align-items-center text-center">
                    <div class="col-12 col-md-10 col-lg-6 text-lg-left reveal">
                        <h2 class="mb-3">Susah melacak pembayaran masuk dan keluar?</h2>
                        <p class="mb-5">Aplikasi ERP Asta App menyederhanakan proses penjualan usaha Anda dan mengelola
                            transaksi lebih efisien.</p>

                        <a href="#" class="btn btn-bg--cta--3">
                            <span class="btn__text d-flex align-items-center"> Hubungi Kami Untuk Demo Aplikasi
                            </span>
                        </a>
                    </div>
                    <!-- end of content col -->
                    <div class="col-12 col-lg-6 mb-3 mb-lg-0">
                        <picture>
                            <img class="img-fluid" src="{{ asset('assets_landing') }}/img/gambar5.png"
                                alt="illustration">
                        </picture>
                    </div>
                    <!-- enf of image col -->
                </div>
                <!--== end of content block 2 row ==-->
            </div>
        </section>
        <!-- =========== End of Content Block ============ -->

        <!-- =========== Start of tech use ============ -->
        <section class="space--bottom bg-color--primary hidden" id="developer">
            <div class="svg-shape--top w-100 z-index1">
                <img src="{{ asset('assets_landing') }}/img/layout/mask-9.svg" alt="mask" class="svg w-100">
            </div>
            <!-- end of top mask -->
            <div class="svg-shape">
                <img src="{{ asset('assets_landing') }}/img/layout/wave-6.svg" alt="wave" class="svg">
            </div>
            <!-- end of wave -->
            <div class="container position-relative z-index2">
                <div class="row mb-3 mb-lg-8">
                    <div class="col-12">
                        <picture>
                            <img class="img-fluid" src="{{ asset('assets_landing') }}/img/macbook-air.png" alt="device">
                        </picture>
                    </div>
                </div>
                <!-- end of device row -->
                <div class="row">
                    <div class="col-12 col-lg-6 mb-3 mx-auto text-center reveal">
                        <div class="section-title">
                            <h2 class="mb-2">Technology Yang Kita Gunakan</h2>
                            <p>Kami telah menggunakan teknologi paling maju dan bahasa pemrograman yang akan membuat
                                segalanya mudah bagi para pengembang </p>
                        </div>
                    </div>
                </div>
                <!-- end section title row -->
                <!-- enf of logo row -->
                <!-- end of content block row -->
            </div>
            <!-- end of container -->
        </section>
        <!-- =========== End of tech use ============ -->

        <!-- =========== Start of Core Features ============ -->

        <!-- =========== End of Core Features ============ -->

        <!-- =========== Start of News ============ -->
        <section class="space--bottom bg-color--primary-light--1 ">
            <div class="container">
                <div class="row justify-content-center reveal">
                    <!-- end of col -->
                </div>
            </div>
        </section>
        <!-- =========== End of News ============ -->

        <!-- =========== Start of Footer and Newsletter ============ -->
        <section class="bg-color--primary hidden">
            <div class="svg-shape--top w-100">
                <img src="{{ asset('assets_landing') }}/img/layout/wave-7.svg" alt="wave" class="svg w-100">
            </div>
            <!-- end of svg shape bottom -->

            <div class="space--bottom position-relative">
                <div class="container">
                    <div class="row justify-content-between align-items-center">
                        <div class="col-12 col-md-7 col-lg-6 mb-3 mb-lg-0 mx-auto mx-md-0">
                            <picture>
                                <img class="img-fluid"
                                    src="{{ asset('assets_landing') }}/img/newsletter-illustrator-1.png"
                                    alt="newsletter-illustrator">
                            </picture>
                        </div>
                        <!-- end of image col -->
                        <div class="col-12 col-sm-8 col-lg-5 pl-lg-0 mx-auto">
                            <div
                                class="newsletter-form form--v2 border--around bg-white rounded--10 box-shadow--3 text-center px-3 pb-5">
                                <div class="pt-4 pb-5">
                                    <h2 class="h3-font mb-1">Mulai bisnis Anda dengan Asta App</h2>
                                    <p class="text-color--400">Menjalankan bisnis bisa lebih efektif dan efisien dengan
                                        Moka sehingga Anda bisa fokus mengembangkan bisnis Anda.</p>
                                </div>
                                <!-- end of title -->
                                <a href="#" class="btn btn-bg--cta--3">
                                    <span class="btn__text d-flex align-items-center"> Hubungi Kami
                                    </span>
                                </a>
                                <!-- end of from -->
                            </div>
                        </div>
                        <!-- end of newsletter col -->
                    </div>
                    <!-- end of newsletter row -->
                </div>
                <!-- end of newletter container -->
            </div>
            <!-- end of newletter Area -->
            <footer class="section--dark footer footer--v1 position-relative">
                <div class="container text-center">
                    <div class="row">
                        <div class="col-12 mb-2">
                            <span class="mb-2">
                                <img src="{{ asset('assets_landing') }}/img/brand-logo.png" alt="brand-logo">
                            </span>
                            <!-- <div class="widget widget-nav">
                                <ul>
                                    <li><a href="#">Download</a></li>
                                    <li><a href="#">Privacy Policy</a></li>
                                    <li><a href="#">Terms of Use</a></li>
                                    <li><a href="#">Whitepaper</a></li>
                                    <li><a href="#">News</a></li>
                                </ul>
                            </div> -->
                            <!-- end of widget -->
                        </div>
                        <!-- end of widget col -->
                    </div>
                    <!-- end of widget row -->
                    <div class="row">
                        <div class="col-12">
                            <div class="footer-border py-3">
                                <ul class="icon-group icon--2x justify-content-center mb-0">
                                    <li class="p-2"><a href="#" class="color--white"><i
                                                class="fab fa-facebook-f"></i></a></li>
                                    <li class="p-2"><a href="#" class="color--white"><i class="fab fa-twitter"></i></a>
                                    </li>
                                    <li class="p-2"><a href="#" class="color--white"><i
                                                class="fab fa-linkedin-in"></i></a></li>
                                    <li class="p-2"><a href="#" class="color--white"><i
                                                class="fab fa-telegram-plane"></i></a></li>
                                    <li class="p-2"><a href="#" class="color--white"><i class="fab fa-youtube"></i></a>
                                    </li>
                                    <li class="p-2"><a href="#" class="color--white"><i
                                                class="fab fa-instagram"></i></a></li>
                                </ul>
                            </div>
                            <!-- end of icon group -->
                        </div>
                        <!-- end of icon group col -->
                    </div>
                    <!-- end of icon group row -->
                    <div class="row">
                        <div class="col-12">
                            <div class="footer-bottom pt-5 pb-3 d-lg-flex justify-content-between">
                                <p class="mb-1">© <a href="{{ route('index') }}">ASTA APP</a> {{ date('Y') }} | All
                                    rights reserved</p>
                                <a class="mb-2 mb-lg-1" href="mailto:hello@astaapp.com">hello@astaapp.com</a>
                            </div>
                            <!-- footer bottom -->
                        </div>
                        <!-- end of bottom footer col -->
                    </div>
                    <!-- end of bottom footer row -->
                </div>
                <!-- end of container -->
            </footer>
        </section>
        <!-- =========== End of Footer and Newsletter ============ -->
    </main>
    <script src="{{ asset('assets_landing') }}/js/plugins.min.js"></script>
    <script src="{{ asset('assets_landing') }}/js/app.js"></script>

</body>

</html>
