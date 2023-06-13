<!DOCTYPE html>
<html lang="en-US" dir="ltr">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- ===============================================-->
    <!--    Document Title-->
    <!-- ===============================================-->
    <title>Spaane | HR assitant</title>

    <!-- ===============================================-->
    <!--    Favicons-->
    <!-- ===============================================-->
    <link rel="apple-touch-icon" sizes="180x180" href="{{ asset('assets/frontend/img/favicons/apple-touch-icon.png') }}">
    <link rel="icon" type="image/png" sizes="32x32" href="{{ asset('assets/images/spaane_blue_icon.png') }}">
    <link rel="icon" type="image/png" sizes="16x16" href="{{ asset('assets/images/spaane_blue_icon.png') }}">
    <link rel="shortcut icon" type="image/x-icon" href="{{ asset('assets/images/spaane_blue_icon.png') }}">
    <link rel="manifest" href="{{ asset('assets/frontend/img/favicons/manifest.json') }}">
    <meta name="msapplication-TileImage" content="{{ asset('assets/img/favicons/mstile-150x150.png') }}">
    <meta name="theme-color" content="#ffffff">

    <!-- ===============================================-->
    <!--    Stylesheets-->
    <!-- ===============================================-->
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Manrope:wght@200;300;400;500;600;700&amp;display=swap" rel="stylesheet">
    <link href="vendors/prism/prism.css" rel="stylesheet">
    <link href="vendors/swiper/swiper-bundle.min.css" rel="stylesheet">
    <link href="assets/frontend/css/theme.min.css" rel="stylesheet" />
    <link href="assets/frontend/css/user.min.css" rel="stylesheet" />
</head>

<body>
<!-- ===============================================-->
<!--    Main Content-->
<!-- ===============================================-->
<main class="main" id="top">
    <nav class="navbar navbar-expand-lg fixed-top navbar-dark" data-navbar-on-scroll="data-navbar-on-scroll">
        <div class="container"><a class="navbar-brand" href="index.html"><img src="{{ asset('assets/images/spaane_white.png') }}" alt="" width=""></a><button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation"><i class="fa-solid fa-bars text-white fs-3"></i></button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav ms-auto mt-2 mt-lg-0">
                    <li class="nav-item"><a class="nav-link active" aria-current="page" href="index.html">Home</a></li>
                    <li class="nav-item"><a class="nav-link" aria-current="page" href="about.html">How it works</a></li>
                    <li class="nav-item"><a class="nav-link" aria-current="page" href="blogs.html">Pricing</a></li>
                    <li class="nav-item"><a class="nav-link" aria-current="page" href="blogs.html">Contact us</a></li>
                    <li class="nav-item mt-2 mt-lg-0"><a class="nav-link btn btn-light text-black w-md-25 w-50 w-lg-100" aria-current="page" href="#">Log In</a></li>
                </ul>
            </div>
        </div>
    </nav>
    <div class="bg-dark"><img class="img-fluid position-absolute end-0" src="assets/img/hero/hero-bg.png" alt="" />

        <!-- ============================================-->
        <!-- <section> begin ============================-->
        <section>
            <div class="container">
                <div class="row align-items-center items-push py-lg-8 py-6">
                    <div class="col-lg-6 text-center text-lg-start">
                        <h1 class="text-white fs-5 fs-xl-6">Send payslips. Manage leave all via Whatsapp.</h1>
                        <p class="text-white py-lg-3 py-2">Instantly send payslips, allocate leave, and share critical information to your employees using WhatsApp.</p>
                        <div class="d-sm-flex align-items-center gap-3"><button class="btn btn-success text-black mb-3 w-75">Start your 30 day Free Trial</button>
                    </div>
                    <div class="col-lg-6 text-center text-lg-end mt-3 mt-lg-0"><img class="img-fluid" src="{{ asset('assets/images/dashboard_shot.png') }}"  alt="" /></div>
                </div>
                {{-- <div class="swiper">
                    <div class="swiper-container swiper-shadow swiper-theme" data-swiper='{"slidesPerView":2,"breakpoints":{"640":{"slidesPerView":2,"spaceBetween":20},"768":{"slidesPerView":4,"spaceBetween":40},"992":{"slidesPerView":5,"spaceBetween":40},"1024":{"slidesPerView":4,"spaceBetween":50},"1025":{"slidesPerView":6,"spaceBetween":50}},"spaceBetween":10,"grabCursor":true,"pagination":{"el":".swiper-pagination","clickable":true},"loop":true,"freeMode":true,"autoplay":{"delay":2500,"disableOnInteraction":false}}'>
                        <div class="swiper-wrapper">
                            <div class="swiper-slide text-center"><img src="assets/img/logos/boldo.png" alt="" /></div>
                            <div class="swiper-slide text-center"><img src="assets/img/logos/presto.png" alt="" /></div>
                            <div class="swiper-slide text-center"><img src="assets/img/logos/boldo.png" alt="" /></div>
                            <div class="swiper-slide text-center"><img src="assets/img/logos/presto.png" alt="" /></div>
                            <div class="swiper-slide text-center"><img src="assets/img/logos/boldo.png" alt="" /></div>
                            <div class="swiper-slide text-center"><img src="assets/img/logos/presto.png" alt="" /></div>
                        </div>
                    </div>
                </div> --}}
            </div><!-- end of .container-->
        </section><!-- <section> close ============================-->
        <!-- ============================================-->

    </div>

    {{-- {{ $slot }} --}}

</main><!-- ===============================================-->
<!--    End of Main Content-->
<!-- ===============================================-->



<!-- ============================================-->
<!-- <section> begin ============================-->
{{-- <section>
    <div class="container bg-dark overflow-hidden rounded-1">
        <div class="bg-holder" style="background-image:url(assets/img/promo/promo-bg.png);"></div>
        <div class="px-5 py-7 position-relative">
            <h1 class="text-center w-lg-75 mx-auto fs-lg-6 fs-md-4 fs-3 text-white">An enterprise template to ramp up your company website</h1>
            <div class="row justify-content-center mt-5">
                <div class="col-auto w-100 w-lg-50"><input class="form-control mb-2 border-light fs-1" type="email" placeholder="Your email address" /></div>
                <div class="col-auto mt-2 mt-lg-0"><button class="btn btn-success text-dark fs-1">Start now</button></div>
            </div>
        </div>
    </div>
</section> --}}
<!-- ============================================-->



<!-- ============================================-->
<!-- <section> begin ============================-->
{{-- <section class="pt-0">
    <div class="container">
        <div class="row justify-content-between">
            <div class="col-lg-6 col-sm-12"><a href="index.html"><img class="img-fluid mt-5 mb-4" src="assets/frontend/img/black-logo.png" alt="" /></a>
                <p class="w-lg-75 text-gray">Social media validation business model canvas graphical user interface launch party creative facebook iPad twitter.</p>
            </div>
            <div class="col-lg-2 col-sm-4">
                <h3 class="fw-bold fs-1 mt-5 mb-4">Landings</h3>
                <ul class="list-unstyled">
                    <li class="my-3 col-md-4"><a href="#">Home</a></li>
                    <li class="my-3"><a href="#">Products</a></li>
                    <li class="my-3"><a href="#">Services</a></li>
                </ul>
            </div>
            <div class="col-lg-2 col-sm-4">
                <h3 class="fw-bold fs-1 mt-5 mb-4">Company</h3>
                <ul class="list-unstyled">
                    <li class="my-3"><a href="#">Home</a></li>
                    <li class="my-3"><a href="#">Careers</a><span class="py-1 px-2 rounded-2 bg-success fw-bold text-dark ms-2">Hiring!</span></li>
                    <li class="my-3"><a href="#">Services</a></li>
                </ul>
            </div>
            <div class="col-lg-2 col-sm-4">
                <h3 class="fw-bold fs-1 mt-5 mb-4">Resources</h3>
                <ul class="list-unstyled">
                    <li class="mb-3"><a href="#">Home</a></li>
                    <li class="mb-3"><a href="#">Products</a></li>
                    <li class="mb-3"><a href="#">Services</a></li>
                </ul>
            </div>
        </div>
        <p class="text-gray">All rights reserved.</p>
    </div>
</section> --}}
<!-- ============================================-->



<!-- ===============================================-->
<!--    JavaScripts-->
<!-- ===============================================-->
<script src="{{ asset('vendors/popper/popper.min.js') }}"></script>
<script src="{{ asset('vendors/bootstrap/bootstrap.min.js') }}"></script>
<script src="{{ asset('vendors/anchorjs/anchor.min.js')}}"></script>
<script src="{{ asset('vendors/is/is.min.js') }}"></script>
<script src="{{ asset('vendors/fontawesome/all.min.js') }}"></script>
<script src="{{ asset('vendors/lodash/lodash.min.js') }}"></script>
<script src="https://polyfill.io/v3/polyfill.min.js?features=window.scroll"></script>
<script src="{{ asset('vendors/prism/prism.js') }}"></script>
<script src="{{ asset('vendors/swiper/swiper-bundle.min.js') }}"></script>
<script src="{{ asset('assets/frontend/js/theme.js') }}"></script>
</body>

</html>
