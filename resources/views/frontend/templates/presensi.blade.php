<!doctype html>
<html lang="en" class="h-100">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="Mark Otto, Jacob Thornton, and Bootstrap contributors">
    <meta name="generator" content="Hugo 0.72.0">
    <title>Gerindra - Kaltim</title>


    

    <!-- Bootstrap core CSS -->
<link rel="stylesheet" href="{{ asset('/assets/kz/bootstrap-4.5.0/css/bootstrap.min.css') }}">

    <style>
      .bd-placeholder-img {
        font-size: 1.125rem;
        text-anchor: middle;
        -webkit-user-select: none;
        -moz-user-select: none;
        -ms-user-select: none;
        user-select: none;
      }

      @media (min-width: 768px) {
        .bd-placeholder-img-lg {
          font-size: 3.5rem;
        }
      }
    </style>

    
    <!-- Custom styles for this template -->
<link rel="stylesheet" href="{{ asset('/assets/kz/bootstrap-4.5.0/css/sticky-footer-navbar.css') }}">

    
    <livewire:styles>
    </head>
    <body class="d-flex flex-column h-100">
    
        
            @yield('content')
       
            <footer class="footer mt-auto py-3 bg-light">
                <div class="container">
                    <div class="row">
                        <div class="col">
                            <span class="text-muted">Samarinda 
                                @php
                                echo now();
                            @endphp
                            </span>
                        </div>
                        <div class="col">
                            <form class="d-flex" >
                                <input class="form-control mr-2" autofocus id="theFieldID" name="q" type="search" placeholder="Search" aria-label="Search">
                                <button class="btn btn-outline-success" type="submit">Search</button>
                              </form>
                        </div>
                    </div>
                </div>
              </footer>
          
        <link rel="stylesheet" href="{{ asset('/assets/kz/bootstrap-4.5.0/js/bootstrap.bundle.min.js') }}">
          
        <script type="text/javascript">
            function SetFocus () {
            var input = document.getElementById ("theFieldID");
            input.focus ();
            }
        </script>
            <livewire:scripts>
    </body>
    </html>