<!DOCTYPE html>
<html>
<head>
    <title>Mapa</title>

    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link href="https://fonts.googleapis.com/css?family=Nunito+Sans:300,400,600,700,800" rel="stylesheet">

    <!-- CSS here -->
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="css/animate.min.css">
    <link rel="stylesheet" href="css/magnific-popup.css">
    <link rel="stylesheet" href="fontawesome/css/all.min.css">
    <link rel="stylesheet" href="css/dripicons.css">
    <link rel="stylesheet" href="css/slick.css">
    <link rel="stylesheet" href="css/default.css">
    <link rel="stylesheet" href="css/swiper.css">
    <link rel="stylesheet" href="css/style-landing.css">
    <link rel="stylesheet" href="css/responsive.css">

    <link rel="stylesheet" href="{{ asset('plugins/bootstrap/dist/css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="path/to/font-awesome/css/font-awesome.min.css">
    <link rel="stylesheet" href="{{ asset('plugins/fontawesome-free/css/all.min.css') }}">
    <link rel="stylesheet" href="{{ asset('plugins/ionicons/dist/css/ionicons.min.css') }}">
    <link rel="stylesheet" href="{{ asset('plugins/icon-kit/dist/css/iconkit.min.css') }}">
    <link rel="stylesheet" href="{{ asset('plugins/perfect-scrollbar/css/perfect-scrollbar.css') }}">
    <link rel="stylesheet" href="{{ asset('dist/css/theme.min.css') }}">
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
    <link rel="stylesheet" href="{{ asset('css/gas-guide.css') }}">

    <link rel="shortcut icon" href="img/logo/logo_icono.png">
    <!-- Place favicon.ico in the root directory -->

    <!-- CSS here -->
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="css/animate.min.css">
    <link rel="stylesheet" href="css/magnific-popup.css">
    <link rel="stylesheet" href="fontawesome/css/all.min.css">
    <link rel="stylesheet" href="css/dripicons.css">
    <link rel="stylesheet" href="css/slick.css">
    <link rel="stylesheet" href="css/default.css">
    <link rel="stylesheet" href="css/swiper.css">
    <link rel="stylesheet" href="css/style-landing.css">
    <link rel="stylesheet" href="css/responsive.css">

    <script src="{{ asset('src/js/vendor/modernizr-2.8.3.min.js') }}"></script>

    <link rel="stylesheet" href="http://cdn.leafletjs.com/leaflet/v0.7.7/leaflet.css" />
    <script src="http://cdn.leafletjs.com/leaflet/v0.7.7/leaflet.js"></script>
    <style>
        #map { width: 100vw; height: 45vw; }
        body { font: 16px/1.4 "Helvetica Neue", Arial, sans-serif; }
        .ghbtns { position: relative; top: 4px; margin-left: 5px; }
        a { color: #0077ff; }
    </style>
</head>

<body>

<!-- header -->
<header class="header-area header-colour">
    <div id="header-sticky" class="menu-area">
        <div class="container">
            <div class="second-menu">
                <div class="row align-items-center">
                    <div class="col-xl-2 col-lg-2">
                        <div class="logo">
                            <a href="index.html"><img src="img/logo/logo_largo_blanco.png" alt="logo" width="230" height="auto"></a>
                        </div>
                    </div>
                    <div class="col-xl-8 col-lg-9">
                        <div class="responsive"><i class="icon dripicons-align-right"></i></div>
                        <div class="main-menu text-right text-xl-right">
                            <nav id="mobile-menu">
                                <ul>
                                    <li class="has-sub">
                                        <a href="/">Inicio</a>
                                    </li>
                                    <li><a href="/mapa">Mapa</a></li>
                                    <li><a href="/#screen">Pantallas</a></li>
                                    <li><a href="/guia">Información adicional</a></li>
                                    <li><a href="/#blog">Blog</a></li>
                                    <li><a href="/#contact">Contacto</a></li>
                                </ul>
                            </nav>
                        </div>
                    </div>
                    <div class="col-xl-2 text-right d-none d-xl-block">
                        <div class="header-btn second-header-btn d-xl-flex">
                            <a href="/login" class="btn">Iniciar sesión</a>
                            <a href="/register" class="btn">Registro</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</header>
<!-- header-end -->

<div id="map"></div>

<!-- <script src="../node_modules/simpleheat/simpleheat.js"></script>
<script src="../src/HeatLayer.js"></script> -->

<script src="../../../public/js/leaflet-heat.js"></script>
<script src="https://cdn.jsdelivr.net/npm/heatmapjs@2.0.2/heatmap.js"></script>
<script src="https://cdn.jsdelivr.net/npm/leaflet-heatmap@1.0.0/leaflet-heatmap.js"></script>


<script>

    var testDataCO = {
        max: 8,
        data: []
    };

    const url = 'http://vmi621282.contaboserver.net/api/v1/mediciones/convert';
    const http = new XMLHttpRequest();

    http.open("GET", url);

    http.setRequestHeader("Accept", "application/json");
    http.setRequestHeader("X-Requested-With", "XMLHttpRequest");
    http.setRequestHeader("Authorization", "Bearer eyJ0eXAiOiJKV1QiLCJhbGciOiJSUzI1NiJ9.eyJhdWQiOiIxIiwianRpIjoiZTIzYzVkNjMyNDM4MDc4NWFiNjgzMjRjM2NkZGU5NGE1NjdjNjNhZTViOTRmMWRjNTkzZDIyM2EyMDk1YTdlMWU2NDUwOGI1NTI2NTFiNzYiLCJpYXQiOjE2NDE4Mjk5MDQuNTEyMDQ1LCJuYmYiOjE2NDE4Mjk5MDQuNTEyMDUyLCJleHAiOjE2NzMzNjU5MDQuNTA3NjgxLCJzdWIiOiIxIiwic2NvcGVzIjpbXX0.bJlbDSxOG_CHb4b0GH6RAvgZJhyMTCU-gU9kJFPLmynnps4v4_RlUTsVE2XUpDPp1jPuwchL87dqxlWa3wqR6oYj-xDZvEZDlSLJyVwFdNczk2lP8xBpsG6n32hZihGG2-mKTH65O1O9ngjZhWxnWFGOwxluQJKnZhb8NqNB9NGZ7rTgKpeIOlelr7CAhA5JnC0TlcIKQEr2YrIsOush7LrczOKA_-yihBmdbgh1QH48qBdqWbijxaXQf025rk_fz6G5-vY_LiwV9oRUE8MstEimVSJd3zGjM63QTgoBXXBEg3trIZpiQUYTuSJRPm2kg0LaygncRyk204RNaqvW5nynqMOxC7EQgVWQkEZmHOx0bGtv2UnZvpiofdg_iCm7N7XOXwRdoL_OThrl6dU3Wok5o4HITzlfn5ipFFLz_rNXTsX_GpPpcOEopKHruWeaeMsyxR_2rumQNlBLhafhN7XVB7KyQ_cDw6SLaEH9UROZhUlGcrGcPb2Z_oZ3vrFTaV0lVveX4u_s3Ax3QbyyzGfDcKajlzEZJ8dZIhTwzH1sp1oZmPQ_NHL7yd8oDzdDykcL6PabyI0MsCH8vhExm5xGOPqmvB8HfQ9UeVx1awaLKchq68gHScO3AKWRTzH6DUovE0gwbqLwvky9uLYfflWoovhx05oPHVdqaixWfsA");

    http.onreadystatechange = function(){

        if(this.readyState == 4 && this.status == 200){
            var resultado = this.responseText;
            console.log(resultado);
        }
    }

    http.send();



    /*var testDataSO2 = {
        max: 8,
        data: [{lat: 38.926810, lng:-0.165582, count: 3},
            {lat: 38.996860, lng:-0.165532, count: 2},
            {lat: 38.996810, lng:-0.145582, count: 3},
            {lat: 38.996857, lng:-0.165588, count: 1},
            {lat: 38.996834, lng:-0.165533, count: 1},
            {lat: 60.8, lng:11.1, count: 1}
        ]
    }; */

    /*var testDataCO = {
        max: 8,
        data: [{lat: 38.926810, lng:-0.165582, count: 3},
            {lat: 38.996860, lng:-0.165532, count: 2},
            {lat: 38.996810, lng:-0.145582, count: 3},
            {lat: 38.996857, lng:-0.165588, count: 1},
            {lat: 38.996834, lng:-0.165533, count: 1},
            {lat: 60.8, lng:11.1, count: 1}
        ]
    };*/

    var medicionIAQ1 = L.marker([38.996834, -0.165511]).bindPopup('La calidad del aire en este punto es buena'),
        medicionIAQ2    = L.marker([38.996831, -0.165587]).bindPopup('La calidad del aire en este punto es buena'),
        medicionIAQ3    = L.marker([38.996815, -0.165532]).bindPopup('La calidad del aire en este punto es buena'),
        medicionIAQ4    = L.marker([38.996819, -0.165682]).bindPopup('La calidad del aire en este punto es buena'),
        medicionIAQ5    = L.marker([38.996838, -0.178382]).bindPopup('La calidad del aire en este punto es normal'),
        medicionIAQ6    = L.marker([38.996719, -0.145682]).bindPopup('La calidad del aire en este punto es buena'),
        medicionIAQ7    = L.marker([38.993819, -0.185682]).bindPopup('La calidad del aire en este punto es mala'),
        medicionIAQ8    = L.marker([38.996813, -0.175682]).bindPopup('La calidad del aire en este punto es buena'),
        medicionIAQ9    = L.marker([38.996819, -0.175562]).bindPopup('La calidad del aire en este punto es normal'),
        medicionIAQ10    = L.marker([38.976819, -0.165212]).bindPopup('La calidad del aire en este punto es mala'),
        medicionIAQ11   = L.marker([38.986819, -0.165562]).bindPopup('La calidad del aire en este punto es buena'),
        medicionIAQ12    = L.marker([38.992229, -0.165342]).bindPopup('La calidad del aire en este punto es buena'),
        medicionIAQ13    = L.marker([38.996219, -0.165634]).bindPopup('La calidad del aire en este punto es buena'),
        medicionIAQ14    = L.marker([38.996349, -0.182682]).bindPopup('La calidad del aire en este punto es buena'),
        medicionIAQ15    = L.marker([38.996763, -0.177682]).bindPopup('La calidad del aire en este punto es mala'),


        medicionSO21 = L.marker([38.996838, -0.165510]).bindPopup('El valor de SO2 es: 1'),
        medicionSO22    = L.marker([38.896833, -0.165514]).bindPopup('El valor de SO2 es: 2'),
        medicionSO23    = L.marker([38.966523, -0.165420]).bindPopup('El valor de SO2 es: 3'),
        medicionSO24    = L.marker([38.984544, -0.165720]).bindPopup('El valor de SO2 es: 5');
    medicionSO25    = L.marker([38.987619, -0.165827]).bindPopup('El valor de SO2 es: 4');
    medicionSO26    = L.marker([38.972356, -0.165332]).bindPopup('El valor de SO2 es: 6');
    medicionSO27    = L.marker([38.899833, -0.166682]).bindPopup('El valor de SO2 es: 7');
    medicionSO28    = L.marker([38.936128, -0.167882]).bindPopup('El valor de SO2 es: 8');
    medicionSO29    = L.marker([38.924763, -0.166542]).bindPopup('El valor de SO2 es: 9');
    medicionSO210    = L.marker([38.992318, -0.163282]).bindPopup('El valor de SO2 es: ');
    medicionSO211    = L.marker([38.976118, -0.163342]).bindPopup('El valor de SO2 es: ');
    medicionSO12    = L.marker([38.989818, -0.166642]).bindPopup('El valor de SO2 es: ');

    var IAQ = L.layerGroup([medicionIAQ1, medicionIAQ2, medicionIAQ3, medicionIAQ4, medicionIAQ5, medicionIAQ6,medicionIAQ7, medicionIAQ8, medicionIAQ9, medicionIAQ10, medicionIAQ11, medicionIAQ12, medicionIAQ13, medicionIAQ14, medicionIAQ15]);
    var SO2 = L.layerGroup ([medicionSO21, medicionSO22, medicionSO23, medicionSO24, medicionSO25, medicionSO26, medicionSO27, medicionSO28,medicionSO29,medicionSO210,medicionSO211, medicionSO12]);

    var baseMaps = {
        "Calidad del aire": IAQ,
        "SO2" : SO2
    };


    var baseLayer = L.tileLayer(
        'http://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png',{
            attribution: 'Map data &copy; <a href="http://openstreetmap.org">OpenStreetMap</a> contributors, <a href="http://creativecommons.org/licenses/by-sa/2.0/">CC-BY-SA</a>, Imagery © <a href="http://cloudmade.com">CloudMade</a>',
            maxZoom: 18
        }
    );
    var cfg = {
        // radius should be small ONLY if scaleRadius is true (or small radius is intended)
        "radius": 0.002,
        "maxOpacity": .8,
        // scales the radius based on map zoom
        "scaleRadius": true,
        // if set to false the heatmap uses the global maximum for colorization
        // if activated: uses the data maximum within the current map boundaries
        //   (there will always be a red spot with useLocalExtremas true)
        "useLocalExtrema": true,
        // which field name in your data represents the latitude - default "lat"
        latField: 'lat',
        // which field name in your data represents the longitude - default "lng"
        lngField: 'lng',
        // which field name in your data represents the data value - default "value"
        valueField: 'count'
    };
    var heatmapLayer = new HeatmapOverlay(cfg);
    var map = new L.Map('map', {
        center: new L.LatLng(38.996810, -0.165582),
        zoom: 12,
        layers: [baseLayer, heatmapLayer]
    });
    heatmapLayer.setData(testDataCO);
    // make accessible for debugging
    layer = heatmapLayer;

    L.control.layers(null, baseMaps).addTo(map);


</script>

<!-- footer -->
<footer id="footer" class="footer-bg footer-p pt-60" style="background-image: url(img/bg/f-bg.png); background-position: center top; background-size: auto;background-repeat: no-repeat;">

    <div class="footer-top">
        <div class="container">
            <div class="row justify-content-between">
                <div class="col-xl-3 col-lg-3 col-sm-6">
                    <div class="footer-widget mb-30">
                        <div class="logo mt-15 mb-15">
                            <a href="#"><img src="img/logo/logo_largo_blanco.png" alt="logo" width="200px" height="auto"></a>
                        </div>
                        <div class="footer-text mb-20">
                            <p>Tecnologías Interactivas EPSG</p>
                        </div>
                        <div class="footer-social">
                            <a href="#"><i class="fab fa-facebook-f"></i></a>
                            <a href="#"><i class="fab fa-twitter"></i></a>
                            <a href="#"><i class="fab fa-instagram"></i></a>
                            <a href="#"><i class="fab fa-google-plus-g"></i></a>
                        </div>
                    </div>
                </div>
                <div class="col-xl-2 col-lg-3 col-sm-6">
                    <div class="footer-widget mb-30">
                        <div class="f-widget-title">
                            <h5>Nuestra compañía</h5>
                        </div>
                        <div class="footer-link">
                            <ul>
                                <li><a href="#">Sobre nosotros</a></li>
                                <li><a href="#">Términos y condiciones</a></li>
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="col-xl-2 col-lg-3 col-sm-6">
                    <div class="footer-widget mb-30">
                        <div class="f-widget-title">
                            <h5>Enlaces de interés</h5>
                        </div>
                        <div class="footer-link">
                            <ul>
                                <li><a href="#">Inicio</a></li>
                                <li><a href="#">Quienes somos</a></li>
                                <li><a href="#">Nuestras funcionalidades</a></li>
                                <li><a href="#">Nuestra app</a></li>
                                <li><a href="#">Noticias</a></li>
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="col-xl-3 col-lg-3 col-sm-6">
                    <div class="footer-widget mb-30">
                        <div class="f-widget-title">
                            <h5>Contáctanos</h5>
                        </div>
                        <div class="footer-link">
                            <div class="f-contact">
                                <ul>
                                    <li>
                                        <i class="icon dripicons-phone"></i>
                                        <span>6786786789<br>+34 6786786789</span>
                                    </li>
                                    <li>
                                        <i class="icon dripicons-mail"></i>
                                        <span><a href="mailto:info@example.com">marselosa@epsg.upv.es</a><br><a href="mailto:sale@example.com">marselocontact@epsg.upv.es</a></span>
                                    </li>
                                    <li>
                                        <i class="fal fa-map-marker-alt"></i>
                                        <span>UPV Campus de Gandía<br>Carrer del Paraninf, 1, Playa de Gandía</span>
                                    </li>
                                </ul>

                            </div>


                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="copyright-wrap text-center">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="copyright-text">
                        <p>&copy; 2021 @ Marselo SA.</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</footer>
<!-- footer-end -->



</body>
</html>
