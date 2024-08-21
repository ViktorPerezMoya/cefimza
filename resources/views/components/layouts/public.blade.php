<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />

        <meta name="description" content="@yield('meta_description')">
        <meta name="keywords" content="@yield('meta_keywords')">
        <meta name="author" content="CEFIMendoza" />
        <title>Agency - Start Bootstrap Theme</title>
        <!-- Favicon-->
        <link rel="icon" type="image/x-icon" href="assets/favicon.ico" />
        <!-- Font Awesome icons (free version)-->
        <script src="https://use.fontawesome.com/releases/v6.3.0/js/all.js" crossorigin="anonymous"></script>
        <!-- Google fonts-->
        <link href="https://fonts.googleapis.com/css?family=Montserrat:400,700" rel="stylesheet" type="text/css" />
        <link href="https://fonts.googleapis.com/css?family=Roboto+Slab:400,100,300,700" rel="stylesheet" type="text/css" />
        <!-- Core theme CSS (includes Bootstrap)-->
        <link href="{{asset('css/styles.css')}}" rel="stylesheet" />
        <style>
            @font-face {
              font-family: 'Belleza';
              src: url('assets/fonts/belleza-regular.ttf') format('truetype');
            }

            body {
              font-family: 'Belleza', Arial, sans-serif;
            }
          </style>
    </head>
    <body id="page-top">
        <!-- Navigation-->

        <nav class="navbar navbar-expand-lg navbar-dark fixed-top {{empty($in_home) ? 'navbar-out-home' : ''}}" id="mainNav">
            <div class="container">
                <a class="navbar-brand" href="./"><img src="{{asset('img/navbar-logo.png')}}" alt="..." /></a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
                    Menu
                    <i class="fas fa-bars ms-1"></i>
                </button>
                <div class="collapse navbar-collapse" id="navbarResponsive">
                    <ul class="navbar-nav text-uppercase ms-auto py-4 py-lg-0">
                        <li class="nav-item"><a class="nav-link" href="/index.php">HOME</a></li>
                        @foreach ($seccionesmenu as $item)
                        <li class="nav-item"><a class="nav-link" href="{{$item->link}}">{{$item->titulo}}</a></li>
                        @endforeach
                        <li class="nav-item"><a class="nav-link" href="/index.php#contact">Contacto</a></li>
                    </ul>
                </div>
            </div>
        </nav>
        <!-- pagina -->
        @yield('content')

        <!-- Footer-->
        <footer class="footer py-4">
            <div class="container">
                <div class="row align-items-center">
                    <div class="col-lg-4 text-lg-start">Copyright &copy; CEFIMendoza 2024</div>
                    <div class="col-lg-4 my-3 my-lg-0">
                        @foreach ($parametros as $item)
                            @if ($item->tipo == 'redsocial')
                            <a class="btn btn-dark btn-social mx-2" href="{{$item->link}}" aria-label="{{$item->detalle}}">{!! $item->icono !!}</a>
                            @endif
                        @endforeach
                    </div>
                    <div class="col-lg-4 text-lg-end">
                        @foreach ($parametros as $item)
                            @if (in_array($item->tipo,['texto','link']))
                            <a class="link-dark text-decoration-none" href="{{$item->link}}">{{$item->detalle}}</a><br>
                            @endif
                        @endforeach
                    </div>
                </div>
            </div>
        </footer>
        <!-- Bootstrap core JS-->
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>
        <!-- Core theme JS-->
        <script src="{{asset('js/scripts.js')}}"></script>
        <!-- * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * *-->
        <!-- * *                               SB Forms JS                               * *-->
        <!-- * * Activate your form at https://startbootstrap.com/solution/contact-forms * *-->
        <!-- * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * *-->
        <script src="https://cdn.startbootstrap.com/sb-forms-latest.js"></script>
        @if (!empty($mapa))
        <script>
            function initMap() {
              var myLatLng = {lat: {{explode(',',$mapa->link)[0]}}, lng: {{explode(',',$mapa->link)[1]}}}; // Coordenadas del mapa

              var map = new google.maps.Map(document.getElementById('map'), {
                center: myLatLng,
                zoom: 14 // Nivel de zoom del mapa
              });

              var marker = new google.maps.Marker({
                position: myLatLng,
                map: map,
                title: 'Avenida Colon 100 - Ciudad - Mendoza' // Título del marcador
              });
            }
          </script>
          <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBu8FkdZ_cGzqsce6uRpghKiR-iMhVqpok&callback=initMap" async defer></script>
        @endif
    </body>
</html>
