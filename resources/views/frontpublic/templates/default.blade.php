<!DOCTYPE html>
<html lang="en">
<head>
    <!-- META ============================================= -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="keywords" content="" />
    <meta name="author" content="" />
    <meta name="robots" content="" />
    
    <!-- DESCRIPTION -->
    <meta name="description" content="Widiawahyuni : Blog and E-Learning" />
    
    <!-- OG -->
    <meta property="og:title" content="Widiawahyuni : Blog and E-Learning" />
    <meta property="og:description" content="Widiawahyuni : Blog and E-Learning" />
    <meta property="og:image" content="" />
    <meta name="format-detection" content="telephone=no">
    
    <!-- FAVICONS ICON ============================================= -->
    <link rel="icon" href="{{ asset('assets/frontpublic/images/favicon.ico')}}" type="image/x-icon" />
    <link rel="shortcut icon" type="image/x-icon" href="{{ asset('assets/frontpublic/images/favicon.png')}}" />
    
    <!-- PAGE TITLE HERE ============================================= -->
    <title>@yield('title', 'Widia Wahyuni')</title>
    
    <!-- MOBILE SPECIFIC ============================================= -->
    <meta name="viewport" content="width=device-width, initial-scale=1">
    @include('frontpublic.templates.styles')
    <livewire:styles />
</head>
<body id="bg">
    <div class="page-wraper">
        {{-- <div id="loading-icon-bx"></div> --}}
        @include('frontpublic.templates.header')

        @yield('content')
        
        @include('frontpublic.templates.footer')
    </div>

    @include('frontpublic.templates.scripts')
    <livewire:scripts />
</body>
</html>