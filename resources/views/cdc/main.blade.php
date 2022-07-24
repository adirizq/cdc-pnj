<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <title>{{ config('app.name', 'CDC PNJ') }}</title>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta name="description" content=" " />
        <meta name="keywords" content="" />
        <meta content="Themesdesign" name="author" />

        <!-- App favicon -->
        <link rel="shortcut icon" href="{{ asset('assets/img/logo.png') }}">

        @stack('head')

        <!-- Bootstrap Css -->
        <link href="{{ asset('cdc/css/bootstrap-green.min.css') }}" id="bootstrap-style" rel="stylesheet" type="text/css" />
        <!-- Icons Css -->
        <link href="{{ asset('cdc/css/icons.min.css') }}" rel="stylesheet" type="text/css" />
        <!-- App Css-->
        <link href="{{ asset('cdc/css/app-green.min.css') }}" id="app-style" rel="stylesheet" type="text/css" />
        <!--Custom Css-->

    </head>
    <body class="{{ $class ?? '' }}">
        <!--start page Loader -->
        <div id="preloader">
            <div id="status">
                <ul>
                    <li></li>
                    <li></li>
                    <li></li>
                    <li></li>
                    <li></li>
                    <li></li>
                </ul>
            </div>
        </div>
        <!--end page Loader -->

        @auth()
            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                @csrf
            </form>
        @endauth
        
        @yield('content')

        <!--start back-to-top-->
        <button onclick="topFunction()" id="back-to-top">
            <i class="mdi mdi-arrow-up"></i>
        </button>
        <!--end back-to-top-->

        <!-- JAVASCRIPT -->
        <script src="{{ asset('cdc/libs/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
        <script src="{{ asset('cdc/libs/bundle/bundle.js') }}"></script>
        <script>
            var mybutton = document.getElementById("back-to-top");
            function scrollFunction() {
                100 < document.body.scrollTop || 100 < document.documentElement.scrollTop ? (mybutton.style.display = "block") : (mybutton.style.display = "none");
            }
            function topFunction() {
                (document.body.scrollTop = 0), (document.documentElement.scrollTop = 0);
            }
            window.onscroll = function () {
                scrollFunction();
            };
            var preloader = document.getElementById("preloader");
            window.addEventListener("load", function () {
                (preloader.style.opacity = "0"), (preloader.style.visibility = "hidden");
            });
        </script>
        
        @stack('js')

    </body>
</html>