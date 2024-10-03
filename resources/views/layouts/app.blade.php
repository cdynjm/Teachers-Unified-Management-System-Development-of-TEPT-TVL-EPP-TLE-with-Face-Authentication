<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta name="token" content="{{ Session::get('token') }}">
    
    @guest
        @if(request()->is('admin/login'))
            <meta name="auth-data" content="{{ $imageData }}">
        @endif
    @endguest

    <link rel="apple-touch-icon" sizes="76x76" href="/img/apple-icon.png">
    <link rel="icon" type="image/png" href="/tums.png">
    <title>
        Teachers Unified Management System
    </title>
    <!--     Fonts and icons     -->
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700" rel="stylesheet" />
    <!-- Nucleo Icons -->
    <link href="/assets/css/nucleo-icons.css" rel="stylesheet" />
    <link href="/assets/css/nucleo-svg.css" rel="stylesheet" />
    <!-- Font Awesome Icons -->
    <script src="https://kit.fontawesome.com/42d5adcbca.js" crossorigin="anonymous"></script>
    <link href="/assets/css/nucleo-svg.css" rel="stylesheet" />
    <!-- CSS Files -->
    <link id="pagestyle" href="/assets/css/argon-dashboard.css" rel="stylesheet" />

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/css/all.min.css" integrity="sha512-Kc323vGBEqzTmouAECnVceyQqyqdsSiqLQISBL29aUW4U/M7pSPA/gEUZQqv1cwx4OnYxTxve5UMg5GT6L4JJg==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/css/brands.min.css" integrity="sha512-EJp8vMVhYl7tBFE2rgNGb//drnr1+6XKMvTyamMS34YwOEFohhWkGq13tPWnK0FbjSS6D8YoA3n3bZmb3KiUYA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel='stylesheet' href='https://cdn.jsdelivr.net/npm/sweetalert2@10.10.1/dist/sweetalert2.min.css' data-navigate-once>

    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@10.16.6/dist/sweetalert2.all.min.js" data-navigate-once></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js" data-navigate-once></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Swiper/4.3.5/js/swiper.min.js" data-navigate-once></script>
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jspdf/1.5.3/jspdf.min.js" data-navigate-once></script>
    <script type="text/javascript" src="https://html2canvas.hertzen.com/dist/html2canvas.js" data-navigate-once></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous" data-navigate-once></script>
    <script src="https://rawgit.com/schmich/instascan-builds/master/instascan.min.js" data-navigate-once></script>
    <script src="https://cdn.jsdelivr.net/npm/axios/dist/axios.min.js" data-navigate-once></script>
    <script src="https://cdn.jsdelivr.net/npm/qrcode-generator/qrcode.js" data-navigate-once></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/html2pdf.js/0.9.2/html2pdf.bundle.min.js" data-navigate-once></script>

    <link rel="stylesheet" href="https://unpkg.com/leaflet@1.9.3/dist/leaflet.css" integrity="sha256-kLaT2GOSpHechhsozzB+flnD+zUyjE2LlfWPgU04xyI=" crossorigin="">
    <link rel="stylesheet" href="https://unpkg.com/leaflet-control-geocoder/dist/Control.Geocoder.css" />
    
    <script src="https://unpkg.com/leaflet@1.9.3/dist/leaflet.js" integrity="sha256-WBkoXOwTeyKclOHuWtc+i2uENFpDZ9YPdf5Hf+D7ewM=" crossorigin="" data-navigate-once></script>
    <script src="./lib/leaflet.browser.print.min.js"></script>
    <script src="https://unpkg.com/leaflet-control-geocoder/dist/Control.Geocoder.js"></script>
    <script src="https://cdn.lordicon.com/lordicon.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/apexcharts"></script>
    
    <link rel='stylesheet' href="{{asset('assets/css/app.css')}}">

    @if(Auth::check())
        <script src="{{asset('assets/js/signout.js')}}" data-navigate-once></script>
        @if(Auth::user()->role == 1)
            <script src="{{asset('assets/js/admin.js')}}" data-navigate-once></script>
            <script src="{{asset('assets/js/map.js')}}" data-navigate-once></script>
        @endif
        @if(Auth::user()->role == 2)
            <script src="{{asset('assets/js/school.js')}}" data-navigate-once></script>
        @endif
        @if(Auth::user()->role == 3)
            <script src="{{asset('assets/js/teacher.js')}}" data-navigate-once></script>
        @endif
    @else
        <script defer src="{{asset('assets/js/face-api.min.js')}}"></script>
        <script defer src="{{asset('assets/js/face-auth.min.js')}}"></script>
        <script src="{{asset('assets/js/signin.js')}}" data-navigate-once></script>
    @endif

    <link href="https://cdn.datatables.net/v/bs5/dt-1.13.8/datatables.min.css" rel="stylesheet">
    
    <script src="https://cdn.datatables.net/v/bs5/dt-1.13.8/datatables.min.js"></script>
    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>

    <script>
        window.onpopstate = function(event) {
            window.location.reload(true);
        };
    </script>

    @livewireStyles
</head>

<body class="{{ $class ?? '' }}">

    <style>
        ::-webkit-scrollbar{width:8px;height:5px}::-webkit-scrollbar-track{background:#f1f1f1;border-radius:10px}::-webkit-scrollbar-thumb{background:#cecece;border-radius:10px}::-webkit-scrollbar-thumb:hover{background:#c2c1c1}
    </style>
    
    @guest
        @yield('content')
    @endguest

    @auth
        @if (in_array(request()->route()->getName(), ['sign-in-static', 'sign-up-static', 'login', 'register', 'recover-password', 'rtl', 'virtual-reality']))
            @yield('content')
        @else
            @if (!in_array(request()->route()->getName(), ['profile', 'profile-static']))
                
            @elseif (in_array(request()->route()->getName(), ['profile-static', 'profile']))
                <div class="position-absolute w-100 min-height-300 top-0" style="background-image: url('https://raw.githubusercontent.com/creativetimofficial/public-assets/master/argon-dashboard-pro/assets/img/profile-layout-header.jpg'); background-position-y: 50%;">
                    <span class="mask bg-primary opacity-6"></span>
                </div>
            @endif
            @include('layouts.navbars.auth.sidenav')
                <main class="main-content border-radius-lg">
                    @yield('content')
                </main>
           
        @endif
    @endauth

    <!--   Core JS Files   -->
    <script src="/assets/js/core/popper.min.js" data-navigate-once></script>
    <script src="/assets/js/core/bootstrap.min.js" data-navigate-once></script>
    <script src="/assets/js/plugins/perfect-scrollbar.min.js" data-navigate-once></script>
    <script src="/assets/js/plugins/smooth-scrollbar.min.js" data-navigate-once></script>

    <script>
        var win = navigator.platform.indexOf('Win') > -1;
        if (win && document.querySelector('#sidenav-scrollbar')) {
            var options = {
                damping: '0.5'
            }
            Scrollbar.init(document.querySelector('#sidenav-scrollbar'), options);
        }
    </script>
    <!-- Github buttons -->
    <script async defer src="https://buttons.github.io/buttons.js"></script>
    <!-- Control Center for Soft Dashboard: parallax effects, scripts for the example pages etc -->
    <script src="/assets/js/argon-dashboard.js"></script>

    <style> #nprogress .bar { background: red !important; } </style>

    @stack('js')
    @livewireScripts
</body>

</html>
