<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>{{ env('APP_NAME') }}</title>
    <base href="/" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.13.0/css/all.min.css" rel="stylesheet">
    <link href="{{ asset('assets/custom/custom.css') }}" rel="stylesheet">

</head>
<body class="bg-teal">
{{-- <header>
    <nav class="navbar navbar-expand-md  fixed-top bg-teal">
        <a class="navbar-brand bg-transparent" href="#">
            <img src="#" alt="" width="150">
        </a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarCollapse" aria-controls="navbarCollapse" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarCollapse">
            <ul class="navbar-nav ml-auto">
                <li class="nav-item home-nav-item">
                    <a class="nav-link nav-main-link" href="#features" id="featuresNav">FEATURES</a>
                </li>
                               <li class="nav-item home-nav-item">
                                   <a class="nav-link nav-main-link" href="#verify" id="verifyNav">VERIFY</a>
                               </li>
                               <li class="nav-item home-nav-item">
                                   <a class="btn btn-primary" href="https://wa.me/" id="verifyNav">Get Proof of residence</a>
                               </li>
            </ul>
        </div>
    </nav>
</header> --}}
<main role="main">
    {{ $slot }}
</main>
{{-- <footer class="footer bg-teal" id="footer-section">
    <div class="container">
        <div class="row">
            <div class="col-md-3">
                <h6 class="nav-heading">
                    <img src="jjjj" alt="sss" width="200"> --}}
                    {{--                    <img src="{{ asset('storage/councils/logo/tsitsing.png') }}" alt="" width="200">--}}
                {{-- </h6>
                <p>
                    sdsdsd
                </p>
            </div> --}}
            {{--            <div class="col-md-3">--}}
            {{--                <div class="pt-2">--}}
            {{--                    --}}
            {{--                    <p>If you are council please login here</p>--}}
            {{--                </div>--}}
            {{--            </div>--}}
            {{-- <div class="col-md-4">
                <h6 class="nav-heading">CONTACT US</h6>
                <ul class="list-unstyled">
                    <li class="footer-list-item">info@</li>
                    <li class="footer-list-item">+27 11 083 6868/+27 82 784 9395</li>
                </ul>
            </div>
            <div class="col-md-2">
                <ul class="list-group list-group-horizontal">
                    <li class="list-group-item list-group-item-transparent social-media-div social-icons">
                        <a href="https://twitter.com/addressdox_sa" class="text-white" target="_blank"><i class="fab fa-twitter"></i></a>
                    </li>
                    <li class="list-group-item social-media-div social-icons">
                        <a href="https://www.facebook.com/addressdox" class="text-white" target="_blank"><i class="fab fa-facebook"></i></a>
                    </li>
                    <li class="list-group-item social-media-div social-icons">
                        <a href="https://www.linkedin.com/company/addressdox/" class="text-white" target="_blank"><i class="fab fa-linkedin"></i></a>
                    </li>
                </ul>
            </div>
        </div>
        <hr class="bg-secondary">
        <div class="container">
            &copy; {{ date('Y') }} - Teambix
        </div>
    </div>
</footer> --}}
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ho+j7jyWK8fNQe+A12Hb8AhRq26LrZ/JpcUGGOn+Y7RsweNrtN/tE3MoK7ZeZDyx" crossorigin="anonymous"></script>
@stack('extra-script')

<style>
    .footer {
        padding-top: 64px;
        padding-bottom: 40px;
        color: white;
    }


</style>
</body>
</html>
