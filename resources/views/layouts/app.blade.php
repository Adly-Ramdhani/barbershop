<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=Nunito" rel="stylesheet">

    <!-- Scripts -->
    @vite(['resources/sass/app.scss', 'resources/js/app.js'])

    <meta
        content="width=device-width, initial-scale=1.0, shrink-to-fit=no"
        name="viewport" />
    <link
        rel="icon"
        href="{{ asset('kaiadmin/assets/img/kaiadmin/favicon.ico') }}"
        type="image/x-icon" />

    <!-- Fonts and icons -->
    <script src="{{ asset('kaiadmin/assets/js/plugin/webfont/webfont.min.js') }}"></script>
    <script>
        WebFont.load({
            google: {
                families: ["Public Sans:300,400,500,600,700"]
            },
            custom: {
                families: [
                    "Font Awesome 5 Solid",
                    "Font Awesome 5 Regular",
                    "Font Awesome 5 Brands",
                    "simple-line-icons",
                ],
                urls: ["{{ asset('kaiadmin/assets/css/fonts.min.css') }}"],
            },
            active: function() {
                sessionStorage.fonts = true;
            },
        });
    </script>

    <!-- CSS Files -->
    <link rel="stylesheet" href="{{ asset('kaiadmin/assets/css/bootstrap.min.css') }}" />
    <link rel="stylesheet" href="{{ asset('kaiadmin/assets/css/plugins.min.css') }}" />
    <link rel="stylesheet" href="{{ asset('kaiadmin/assets/css/kaiadmin.min.css') }}" />
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
</head>

<body>
    <div class="wrapper">
        @auth
        @include('layouts.sidebar')
        @endauth

        <div class="main-panel">
            @auth
            @include('layouts.navbar')
            @endauth

            <div class="container">
                <div class="page-inner">
                    <main>
                        @yield('content')
                    </main>
                </div>
            </div>

            @auth
            @include('layouts.footer')
            @endauth
        </div>
    </div>
     <!--   Core JS Files   -->
     <script src="{{ asset('kaiadmin/assets/js/core/jquery-3.7.1.min.js') }}"></script>
     {{-- <script src="{{ asset('kaiadmin/assets/js/core/popper.min.js') }}"></script>
     <script src="{{ asset('kaiadmin/assets/js/core/bootstrap.min.js') }}"></script>   --}}
     {{-- <script src="assets/js/core/jquery-3.7.1.min.js"></script> --}}
     <script src="assets/js/core/popper.min.js"></script>
     <script src="assets/js/core/bootstrap.min.js"></script>
 
     <!-- jQuery Scrollbar -->
     <script src="{{ asset('kaiadmin/assets/js/plugin/jquery-scrollbar/jquery.scrollbar.min.js') }}"></script>
 
     <!-- Chart JS -->
     <script src="{{ asset('kaiadmin/assets/js/plugin/chart.js/chart.min.js') }}"></script>
 
     <!-- jQuery Sparkline -->
     <script src="{{ asset('kaiadmin/assets/js/plugin/jquery.sparkline/jquery.sparkline.min.js') }}"></script>
 
     <!-- Chart Circle -->
     <script src="{{ asset('kaiadmin/assets/js/plugin/chart-circle/circles.min.js') }}"></script>
 
     <!-- Datatables -->
     <script src="{{ asset('kaiadmin/assets/js/plugin/datatables/datatables.min.js') }}"></script>
 
     <!-- Bootstrap Notify -->
     <script src="{{ asset('kaiadmin/assets/js/plugin/bootstrap-notify/bootstrap-notify.min.js') }}"></script>
 
     <!-- jQuery Vector Maps -->
     <script src="{{ asset('kaiadmin/assets/js/plugin/jsvectormap/jsvectormap.min.js') }}"></script>
     <script src="{{ asset('kaiadmin/assets/js/plugin/jsvectormap/world.js') }}"></script>
 
     <!-- Sweet Alert -->
     <script src="{{ asset('kaiadmin/assets/js/plugin/sweetalert/sweetalert.min.js') }}"></script>
 
     <!-- Kaiadmin JS -->
     <script src="{{ asset('kaiadmin/assets/js/kaiadmin.min.js') }}"></script>
 
     <!-- Kaiadmin DEMO methods, don't include it in your project! -->
     <script src="{{ asset('kaiadmin/assets/js/setting-demo.js') }}"></script>
     <script src="{{ asset('kaiadmin/assets/js/demo.js') }}"></script>
    <script>

        
        $("#lineChart").sparkline([102, 109, 120, 99, 110, 105, 115], {
            type: "line",
            height: "70",
            width: "100%",
            lineWidth: "2",
            lineColor: "#177dff",
            fillColor: "rgba(23, 125, 255, 0.14)",
        });

        $("#lineChart2").sparkline([99, 125, 122, 105, 110, 124, 115], {
            type: "line",
            height: "70",
            width: "100%",
            lineWidth: "2",
            lineColor: "#f3545d",
            fillColor: "rgba(243, 84, 93, .14)",
        });

        $("#lineChart3").sparkline([105, 103, 123, 100, 95, 105, 115], {
            type: "line",
            height: "70",
            width: "100%",
            lineWidth: "2",
            lineColor: "#ffa534",
            fillColor: "rgba(255, 165, 52, .14)",
        });
    </script>

    @stack('scripts')
</body>

</html>