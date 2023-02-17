<!doctype html>
<!--[if lte IE 9]>     <html lang="en" class="no-focus lt-ie10 lt-ie10-msg"> <![endif]-->
<!--[if gt IE 9]><!--> <html lang="en" class="no-focus"> <!--<![endif]-->
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0">

    <title>Teambix HR</title>

    <meta name="description" content="Codebase - Bootstrap 4 Admin Template &amp; UI Framework created by pixelcave and published on Themeforest">
    <meta name="author" content="pixelcave">
    <meta name="robots" content="noindex, nofollow">

    <!-- Open Graph Meta -->
    <meta property="og:title" content="Codebase - Bootstrap 4 Admin Template &amp; UI Framework">
    <meta property="og:site_name" content="Codebase">
    <meta property="og:description" content="Codebase - Bootstrap 4 Admin Template &amp; UI Framework created by pixelcave and published on Themeforest">
    <meta property="og:type" content="website">
    <meta property="og:url" content="">
    <meta property="og:image" content="">

    <!-- Icons -->
    <!-- The following icons can be replaced with your own, they are used by desktop and mobile browsers -->
    <link rel="shortcut icon" href="{{ asset('assets/images/updated_logo2.png')}}">
    <!-- <link rel="icon" type="image/png" sizes="192x192" href="assets/media/favicons/favicon-192x192.png">
    <link rel="apple-touch-icon" sizes="180x180" href="assets/media/favicons/apple-touch-icon-180x180.png"> -->
    <!-- END Icons -->

    <!-- Stylesheets -->
    <!-- Codebase framework -->
    <link rel="stylesheet" id="css-main" href="{{ asset('assets/custom/css/codebase.min.css')}}">
    <link rel="stylesheet"  href="{{ asset('assets/custom/css/style.css')}}">

    <!--Multiple slider-->
    <link rel="stylesheet" href="{{ asset('assets/custom/js/plugins/slick/slick.min.css')}}">
    <link rel="stylesheet" href="{{ asset('assets/custom/js/plugins/slick/slick-theme.min.css')}}">



    <!-- You can include a specific file from css/themes/ folder to alter the default color theme of the template. eg: -->
    <!-- <link rel="stylesheet" id="css-theme" href="assets/css/themes/flat.min.css"> -->
    <link rel="stylesheet" id="css-theme" href="{{ asset('assets/custom/css/themes/pulse.min.css')}}">
    <link rel="stylesheet" href="{{ asset('assets/custom/js/plugins/bootstrap-datepicker/css/bootstrap-datepicker3.min.css')}}">
    <link rel="stylesheet" href="{{ asset('assets/custom/js/plugins/dropzonejs/min/dropzone.min.css')}}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/3.7.2/animate.min.css">

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/fullcalendar-scheduler@5.11.3/main.min.css" integrity="sha256-lQnxfLYgySmY6nHM7LkVqcS2RdJvFUV2p6FHg04SZN4=" crossorigin="anonymous">
    <link rel="stylesheet" href="{{ asset('assets/custom/js/plugins/jquery-tags-input/jquery.tagsinput.min.css')}}">
    @stack('extra-css')

    <script src="https://unpkg.com/axios/dist/axios.min.js"></script>
    <!-- 2. Link VCalendar Javascript (Plugin automatically installed) -->
    {{--    <script src="https://cdnjs.cloudflare.com/ajax/libs/vee-validate/3.0.5/vee-validate.min.js" integrity="sha256-JzAmQwckhA6rsfE83AHkXsPGVJ6N3Snbk6QjyeIMBxk=" crossorigin="anonymous"></script>--}}
</head>
<body>
    <div id="page-container" class="sidebar-mini sidebar-o sidebar-inverse side-scroll page-header-fixed page-header-glass page-header-inverse main-content-boxed">
    <!-- Side Overlay-->
    <aside id="side-overlay">
        <!-- Side Overlay Scroll Container -->
        <div id="side-overlay-scroll">
            <!-- Side Header -->
            <div class="content-header content-header-fullrow">
                <div class="content-header-section align-parent">
                    <!-- END Close Side Overlay -->

                    <!-- User Info -->
                    <div class="content-header-item">
                        <a class="img-link mr-5" href="be_pages_generic_profile.html">
                            <img class="img-avatar img-avatar32" src="assets/media/avatars/avatar15.jpg" alt="">
                        </a>
                        <a class="align-middle link-effect text-primary-dark font-w600" href="be_pages_generic_profile.html">John Smith</a>
                    </div>
                    <!-- END User Info -->
                </div>
            </div>
            <!-- END Side Header -->

        </div>
        <!-- END Side Overlay Scroll Container -->
    </aside>
    <!-- END Side Overlay -->

    <!-- Sidebar -->
    <!--
        Helper classes

        Adding .sidebar-mini-hide to an element will make it invisible (opacity: 0) when the sidebar is in mini mode
        Adding .sidebar-mini-show to an element will make it visible (opacity: 1) when the sidebar is in mini mode
            If you would like to disable the transition, just add the .sidebar-mini-notrans along with one of the previous 2 classes

        Adding .sidebar-mini-hidden to an element will hide it when the sidebar is in mini mode
        Adding .sidebar-mini-visible to an element will show it only when the sidebar is in mini mode
            - use .sidebar-mini-visible-b if you would like to be a block when visible (display: block)
    -->
   {{ $sidemenu }}
    <!-- END Sidebar -->

    <!-- Header -->
    {{ $header }}
    <!-- END Header -->

    <!-- Main Container -->
    <main id="main-container">

        <!-- Hero -->
        <div class="bg-image bg-image-bottom" >
            <div class="bg-light-grey">
{{--                <div class="content content-top text-center overflow-hidden">--}}
{{--                    <input type="text" class="form-control" placeholder="Search..." id="page-header-search-input" name="page-header-search-input">--}}
{{--                </div>--}}
            </div>
        </div>
        <!-- END Hero -->
        {{ $slot }}

    </main>
    <!-- END Main Container -->

    <!-- Footer -->
    <footer id="page-footer" class="opacity-0">
        <div class="content py-20 font-size-xs clearfix">
{{--            <div class="float-right">--}}
{{--                Crafted with <i class="fa fa-heart text-pulse"></i> by <a class="font-w600" href="http://goo.gl/vNS3I" target="_blank">pixelcave</a>--}}
{{--            </div>--}}
{{--            <div class="float-left">--}}
{{--                <a class="font-w600" href="https://goo.gl/po9Usv" target="_blank">Codebase 2.1</a> &copy; <span class="js-year-copy">2017</span>--}}
{{--            </div>--}}
        </div>
    </footer>
    <!-- END Footer -->
</div>
</body>

<style>
    #page-container.page-header-fixed #page-header>.content-header {
        padding-top: 17px;
        padding-bottom: 54px;
    }
    .border-radius{
        border-radius: 4px;
    }
</style>
<!-- Codebase Core JS -->
<script src="{{ asset('assets/custom/js/core/jquery.min.js')}}"></script>
<script src="{{ asset('assets/custom/js/core/bootstrap.bundle.min.js')}}"></script>
<script src="{{ asset('assets/custom/js/core/jquery.slimscroll.min.js')}}"></script>
<script src="{{ asset('assets/custom/js/core/jquery.scrollLock.min.js')}}"></script>
<script src="{{ asset('assets/custom/js/core/jquery.appear.min.js')}}"></script>
{{--<script src="{{ asset('assets/custom/js/core/jquery.countTo.min.js')}}"></script>--}}
{{--<script src="{{ asset('assets/custom/js/core/js.cookie.min.js')}}"></script>--}}
<script src="{{ asset('assets/custom/js/codebase.js')}}"></script>
<script src="{{ asset('assets/custom/js/pages/db_pop.js')}}"></script>
<script src="https://cdn.jsdelivr.net/npm/vue/dist/vue.js"></script>
<script src="https://unpkg.com/vuejs-datepicker"></script>  {{-- Todo : you must get rid of this one and use v-calendar --}}
{{--<script src='https://unpkg.com/v-calendar'></script>--}}
<script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.24.0/moment.min.js" integrity="sha256-4iQZ6BVL4qNKlQ27TExEhBN1HFPvAvAMbFavKKosSWQ=" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/fullcalendar-scheduler@5.11.3/main.min.js"></script>
<script src="{{ asset('assets/custom/js/plugins/jquery-tags-input/jquery.tagsinput.js')}}"></script>
{{--<script src="{{ asset('assets/custom/js/plugins/bootstrap-datepicker/js/bootstrap-datepicker.min.js')}}"></script>--}}
{{--<script src="{{ asset('assets/custom/js/pages/be_comp_calendar.js')}}"></script>--}}
@stack('extra-js')
<script>
    $(document).ready(function() {
        $('.js-example-basic-multiple').select2();
    });
</script>

{{--<script src="{{ asset('assets/custom/js/plugins/chartjs/Chart.bundle.min.js')}}"></script>--}}
{{--<script src="{{ asset('assets/custom/js/plugins/slick/slick.min.js')}}"></script>--}}
{{--<script src="{{ asset('assets/custom/js/plugins/dropzonejs/dropzone.js')}}"></script>--}}

<!-- Page JS Plugins -->
{{-- <script src="{{ asset('assets/custom/js/plugins/jquery-raty/jquery.raty.min.js')}}"></script>--}}

<!-- Page JS Code -->
{{--<script src="{{ asset('assets/custom/js/pages/be_comp_rating.js')}}"></script>--}}


</body>
</html>

