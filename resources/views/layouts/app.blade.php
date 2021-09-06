<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Fonts -->
    <link rel="shortcut icon" href="{{{ url('storage/logos/NRMag-blacklogo.png') }}}">
    <link rel="stylesheet" href="{{ asset('plugins/admin-lte/plugins/fontawesome-free/css/all.min.css') }}">

    <!-- Styles -->
    <link href="{{ asset('plugins/owl-carousel/css/animate.css') }}" rel="stylesheet">
    <link href="{{ asset('plugins/owl-carousel/owlcarousel/assets/owl.carousel.min.css') }}" rel="stylesheet">
    <link href="{{ asset('plugins/owl-carousel/owlcarousel/assets/owl.theme.default.min.css') }}" rel="stylesheet">
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link href="{{ asset('plugins/mdbootstrap/css/bootstrap.css') }}" rel="stylesheet">
    <link href="{{ asset('dflip/css/dflip.min.css') }}" rel="stylesheet">
    <link href="{{ asset('dflip/css/themify-icons.min.css') }}" rel="stylesheet">
    <link href="{{ asset('css/style.css') }}" rel="stylesheet">
    <link href="{{ asset('css/mdb.min.css') }}" rel="stylesheet">
    <style>
        @font-face {
            font-family: 'Gotham Regular';
            src: url('{{ asset("fonts/Gotham Regular.otf") }}');
        }

        @font-face {
            font-family: 'Gotham Medium';
            src: url('{{ asset("fonts/Gotham Medium.otf") }}');
        }

        @font-face {
            font-family: 'keep on truckin';
            src: url('{{ asset("fonts/FontsFree-Net-KeeponTruckin.ttf") }}');
            /* font-weight: bold; */
        }

        @font-face {
            font-family: 'Gotham Bold';
            src: url('{{ asset("fonts/Gotham Bold.otf") }}');
            /* font-weight: bold; */
        }

        @font-face {
            font-family: 'Gotham Light';
            src: url('{{ asset("fonts/Gotham Light Regular.otf") }}');
            /* font-weight: bold; */
        }

        @font-face {
            font-family: "Bebas Neue";
            font-weight: 400;
            font-style: normal;
            src: url('{{ asset("fonts/BebasNeue-Regular.ttf") }}');
            /* font-weight: bold; */
        }

        @font-face {
            font-family: "Gotham";
            src: url('{{ secure_asset("fonts/Gotham-Thin.otf" )}}');
            src: url("https://db.onlinewebfonts.com/t/edc378fa3251080c5b508b220462efca.eot");
            src: url("https://db.onlinewebfonts.com/t/edc378fa3251080c5b508b220462efca.eot?#iefix") format("embedded-opentype"),
                url("https://db.onlinewebfonts.com/t/edc378fa3251080c5b508b220462efca.woff2") format("woff2"),
                url("https://db.onlinewebfonts.com/t/edc378fa3251080c5b508b220462efca.woff") format("woff"),
                url("https://db.onlinewebfonts.com/t/edc378fa3251080c5b508b220462efca.ttf") format("truetype"),

                url("https://db.onlinewebfonts.com/t/edc378fa3251080c5b508b220462efca.svg#Gotham") format("svg");
        }

        .font {
            font-size: 0.9rem !important;
        }

        .creative-lp .navbar {
            font-weight: 400;
            background-color: #dddde4 !important;
        }

        .text-red-light {
            color: #c0503a !important;
        }

        .text-red {
            color: #c01f22 !important;
        }

        .custom-top-border {
            border-radius: 1rem 1rem 0 0 !important;
        }

        .custom-bottom-border {
            border-radius: 0 0 1rem 1rem !important;
        }

        .custom-border {
            border-radius: 1rem !important;
        }

        .custom-shadow {
            box-shadow: 1rem 1rem 20rem 20px rgb(0 0 0 / 28%) !important;
        }

        .form-search {
            transform: translate(0%, 0%);
            transition: all 1s;
            /* width: 45px;
            height: 40px; */
            width: 15px;
            height: 30px;
            background: white;
            box-sizing: border-box;
            border-radius: 25px;
            border: 4px solid white;
            padding: 0px;
        }

        .searh-bar {
            width: 100%;
            line-height: 15px;
            outline: 0;
            border: 0;
            display: none;
            font-size: 1em;
            border-radius: 20px;
            padding: 0px 5px;
            font-size: 1rem;
            font-weight: 400;
            line-height: 1.5;
            color: #495057;
        }

        .fa {
            box-sizing: border-box;
            padding: 10px;
            width: 44px;
            height: 35px;
            position: absolute;
            top: -7px;
            right: -11px;
            border-radius: 50%;
            color: #07051a;
            text-align: center;
            font-size: 1.2em;
            transition: all 1s;
        }

        .form-search:hover {
            width: 20% !important;
            cursor: pointer;
        }

        .form-search:hover input {
            display: block;
            width: 100% !important;

        }
    </style>
    @stack('css')
</head>

<body class="creative-lp">

    <div id="app">
        <!-- <form-blog></form-blog> -->
        <header>
            @include('layouts.header')
        </header>
        <main class="pb-2">
            <div id="lottie"></div>
            @yield('content')
        </main>

        @include('layouts.footer')
    </div>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <script src="{{ asset('plugins/mdbootstrap/js/mdb.min.js') }}"></script>
    <script src="{{ asset('plugins/owl-carousel/vendors/jquery.min.js') }}"></script>
    <script src="{{ asset('js/app.js') }}"></script>
    <script src="{{ asset('js/mdb.js') }}"></script>
    <script src="{{ asset('plugins/owl-carousel/owlcarousel/owl.carousel.js')}}"></script>
    <script src="{{ asset('dflip/js/dflip.min.js')}}"></script>
    <script>
        $(document).ready(function() {
            $('[data-toggle="tooltip"]').tooltip();
        });
    </script>
    <script type="text/javascript">
        var animation = bodymovin.loadAnimation({
            container: document.getElementById('lottie'), // Required
            path: 'data.json', // Required
            renderer: 'svg/canvas/html', // Required
            loop: true, // Optional
            autoplay: true, // Optional
            name: "Hello World", // Name for future reference. Optional.
        })
        $(document).ready(function() {
            new WOW().init();
        });
        $(function() {
            $("#mdb-lightbox-ui").load("../mdb-addons/mdb-lightbox-ui.html");
        });
    </script>
    @stack('js')
</body>

</html>
