<!DOCTYPE html>
<html class="no-js" lang="zxx">
<head>
    <!-- Meta Tags -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="keywords" content="zaelani.id" />
    <meta name="description" content="">
    <meta name='copyright' content='zaelani.id'>
    
    <!-- Title Tag -->
    <title>@yield('title')</title>
    <!-- Favicon -->
    <link rel="icon" type="image/png" href="{{ asset('/storage/logo/favicon.png') }}">	
    <!-- Google Font -->
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700,800" rel="stylesheet">
    
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="{{ asset('/assets/kz/bootstrap-4.5.0/css/bootstrap.min.css') }}">
    {{--  <link rel="stylesheet" href="{{ mix('css/app.css') }}">  --}}
    <!-- Animate CSS -->
    <link rel="stylesheet" href="{{ asset('/assets/kz/css/animate.min.css') }}">
    <!-- Animate Text CSS -->
    <link rel="stylesheet" href="{{ asset('/assets/kz/css/animate-text.css') }}">
    <!-- Icofont CSS -->
    <link rel="stylesheet" href="{{ asset('/assets/kz/css/icofont.css') }}">
    <!-- Font Awesome CSS -->
    {{-- <link rel="stylesheet" hrf="{{ asset('/assets/kz/css/font-awesome.min.css') }}"> --}}
    <link rel="stylesheet" href="{{ asset('assets/kz/vendor/fontawesome/css/all.min.css') }}">
    <!-- Jquery Ui CSS -->
    <link rel="stylesheet" href="{{ asset('/assets/kz/css/jquery-ui.css') }}">
    <!-- Flex Slider CSS -->
    <link rel="stylesheet" href="{{ asset('/assets/kz/css/flex-slider.min.css') }}">
    <!-- Dzs Parallaxer CSS -->
    <link rel="stylesheet" href="{{ asset('/assets/kz/css/dzsparallaxer.min.css') }}">
    <!-- Owl Carousel CSS -->
    <link rel="stylesheet" href="{{ asset('/assets/kz/css/owl.carousel.min.css') }}">
    <!-- Slick Nav CSS -->
    <link rel="stylesheet" href="{{ asset('/assets/kz/css/slicknav.min.css') }}">
    <!-- Youtube Player CSS -->
    <link rel="stylesheet" href="{{ asset('/assets/kz/css/ytplayer.min.css') }}">
    <!-- FancyBox CSS -->
    <link rel="stylesheet" href="{{ asset('/assets/kz/css/fancybox.min.css') }}">
    <!-- Nice Select CSS -->
    <link rel="stylesheet" href="{{ asset('/assets/kz/css/niceselect.css') }}">
    <!-- Cube Portfolio CSS -->
    <link rel="stylesheet" href="{{ asset('/assets/kz/css/cubeportfolio.min.css') }}">
    <!-- Magnific Popup CSS -->
    <link rel="stylesheet" href="{{ asset('/assets/kz/css/magnific-popup.css') }}">
    
    <!-- Style CSS -->
    <link rel="stylesheet" href="{{ asset('/assets/kz/bootstrap-4.5.0/css/custom/style-blue.css')}}">
    <link rel="stylesheet" href="{{ asset('/assets/kz/css/responsive.css')}}">
    <!-- SKin Color -->
    <link rel="stylesheet" href="{{ asset('/assets/kz/bootstrap-4.5.0/css/skin/skinblue.css')}}">
    
    <livewire:styles>
    </head>
    <body class="box-bg">
        <div class="boxed-layout">
            <livewire:frontend.main.header />
            @yield('content')
           {{--  <livewire:frontend.main.newsletter />  --}}
           <livewire:frontend.main.footer />
        </div>
        <!-- Jquery JS -->
            <script src="{{ asset('/assets/kz/js/jquery.min.js') }}"></script>
            <script src="{{ asset('/assets/kz/js/jquery-migrate.min.js') }}"></script>
            <script src="{{ asset('/assets/kz/js/jquery-ui.min.js') }}"></script>
            <!-- Bootstrap JS -->
            <script src="{{ asset('/assets/kz/js/popper.min.js') }}"></script>
            <script src="{{ asset('/assets/kz/bootstrap-4.5.0/js/bootstrap.min.js') }}"></script>
            <!-- Modernizer JS -->
            <script src="{{ asset('/assets/kz/js/modernizr.min.js') }}"></script>
            <!-- Particles JS -->
            {{-- <script src="{{ asset('/assets/kz/js/particles.min.js') }}"></script> --}}
            {{-- <script src="{{ asset('/assets/kz/js/particle-active.js') }}"></script> --}}
            <!-- Theme Plugins JS -->
            <script src="{{ asset('/assets/kz/js/theme-plugins.js') }}"></script>
            <!-- Main JS -->
            <script src="{{ asset('/assets/kz/js/main.js') }}"></script>
            {{--  <script src="{{ mix('js/app.js') }}"></script>  --}}
            <livewire:scripts>
    </body>
    </html>