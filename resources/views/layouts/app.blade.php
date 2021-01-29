<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>

    <!-- Fonts -->
    <link href="https://unpkg.com/tailwindcss@^2/dist/tailwind.min.css" rel="stylesheet">
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.3.0/font/bootstrap-icons.css">
    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
</head>
<body>
    <div id="app">
        <nav class="navbar navbar-expand-md navbar-light bg-white shadow-sm">
            <div class="container">
                <a class="navbar-brand" href="{{ url('/home') }}">
                    {{ config('app.name', 'Home') }}
                </a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <!-- Left Side Of Navbar -->
                    <ul class="navbar-nav mr-auto">

                    </ul>

                    <!-- Right Side Of Navbar -->
                    <ul class="navbar-nav ml-auto">
                        <!-- Authentication Links -->
                        @guest
                            @if (Route::has('login'))
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                                </li>
                            @endif
                            
                            @if (Route::has('register'))
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                                </li>
                            @endif
                        @else
                            <li class="nav-item dropdown">
                                <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                    {{ Auth::user()->name }}
                                </a>

                                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                                    <a class="dropdown-item" href="{{ route('logout') }}"
                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                        {{ __('Logout') }}
                                    </a>

                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                        @csrf
                                    </form>
                                </div>
                            </li>
                        @endguest
                    </ul>
                </div>
            </div>
        </nav>

        <main class="py-4 container">
            @yield('content')
        </main>
        <footer class="bg-dark text-white text-center text-lg-start">
            <!-- Grid container -->
            <div class="container p-4">
                <!--Grid row-->
                <div class="row">
                <!--Grid column-->
                <div class="col-lg-3  mb-4 mb-md-0">
                    <a href="https://iiha.id" class="d-block"><img width="120px" height="52px" data-src="https://iiha.id/wp-content/uploads/2020/07/iiha-logo-lightx.svg" class=" lazyloaded" src="https://iiha.id/wp-content/uploads/2020/07/iiha-logo-lightx.svg"><noscript><img src="https://iiha.id/wp-content/uploads/2020/07/iiha-logo-lightx.svg" width="120px"
                            height="52px" /></noscript></a>
                    <div class="social--media mt-4">
                        <ul class="d-flex align-items-center">
                            <li style="list-style-type: none;" class="mx-2">
                                <a href="https://www.youtube.com/channel/UCByBVs4IWdH_it9lZmRn4qg" target="_blank" rel="noopener noreferrer">
                                    <i style="font-size: 24px;" class="text-white bi bi-youtube"></i>
                                </a>
                            </li>
                            <li style="list-style-type: none;" class="mx-2">
                                <a href="https://www.linkedin.com/company/iihaofficial/" target="_blank" rel="noopener noreferrer">
                                    <i style="font-size: 24px;" class="text-white bi bi-linkedin"></i>
                                </a>
                            </li>
                            <li style="list-style-type: none;" class="mx-2">
                                <a href="https://www.facebook.com/groups/1530892533906128/" target="_blank" rel="noopener noreferrer">
                                    <i style="font-size: 24px;" class="text-white bi bi-facebook"></i>
                                </a>
                            </li>
                                                                                                </ul>
                    </div>
                    <p class="copyright">Copyright © 2020 IIHA</p>
                </div>
                <!--Grid column-->

                <!--Grid column-->
                <div class="col-lg-5  mb-4 mb-md-0">
                    <p>Indonesian Industial Hygiene Association “Guardian of Workers’ Health”</p>
                </div>
                <!--Grid column-->

                <!--Grid column-->
                <div class="col-lg-4  mb-4 mb-md-0">
                    <u class="mb-0">Office:</u>

                    <div class="address-panel">
                        <div class="address">
                            <h5>Laboratorium K3 UI</h5>
                            <p>Jl. Prof. Dr. Sujudi, Pondok Cina, Beji. Gedung C Lantai 3 No. Ruang C.302, Beji, Pondok Cina, Kecamatan Beji, Kota Depok, Jawa Barat 16424</p>
                        </div>
                        <div class="map-area">
                        <div id="map" style="width: 100%; min-height: 150px;"></div>
                        </div>
                    </div>
                </div>
                <!--Grid column-->
                </div>
                <!--Grid row-->
            </div>
            <!-- Grid container -->
            </footer>
    </div>

    <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDfDTwbgh1d1FDEWJwizePMcfOOYBvRW-w&callback=initMap" async
	defer></script>
    <script>
    var map;

    function initMap(_lat, _lng, el) {
        var mapCanvas = document.getElementById(el ? el : "map");
        var myLatLng = {
            lat: _lat ? _lat : -6.371044,
            lng: _lng ? _lng : 106.828982
        };

        var mapOptions = {
            center: myLatLng,
            zoom: 15,
            draggable: false,
            scrollwheel: false,

        };
        map = new google.maps.Map(mapCanvas, mapOptions);
        var marker = new google.maps.Marker({
            position: myLatLng,
            map: map,
        });
    }
    function initMapWithGeocoder(address){
        console.log(address)
        var mapCanvas = document.getElementById("event_map");
        var geocoder = new google.maps.Geocoder();
        var myLatLng = {
            lat: -6.371044,
            lng: 106.828982
        };

        geocoder.geocode( { 'address': address}, (results, status)=> {
            if (status == google.maps.GeocoderStatus.OK) {
                // console.log(results);
                myLatLng.lat = results[0].geometry.location.lat();
                myLatLng.lng = results[0].geometry.location.lng();
            }
            // console.log(myLatLng);
            var mapOptions = {
                center: myLatLng,
                zoom: 15,
                draggable: false,
                scrollwheel: false,
            };
            map = new google.maps.Map(mapCanvas, mapOptions);
            var marker = new google.maps.Marker({
                position: myLatLng,
                map: map,
            });
        });
    }
    initMap()
    </script>
</body>
</html>
