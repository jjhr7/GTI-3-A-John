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
        @media all and (max-width: 479px) {
            #map{
                width: 100%;
                height: 100%;
            }
            #footer{
                display: none;
            }
        }
        #map { width: 100vw; height: 100vw; }
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


    var testData = {
        max: 8,
        data: [{lat: 38.926810, lng:-0.165582, count: 3},{lat: 38.996860, lng:-0.165532, count: 2},{lat: 38.996810, lng:-0.145582, count: 3},{lat: 38.996857, lng:-0.165588, count: 1},{lat: 38.996834, lng:-0.165533, count: 1},{lat: 60.8, lng:11.1, count: 1}]
    };

    var littleton = L.marker([38.996834, -0.165511]).bindPopup('This is Littleton, CO.'),
        denver    = L.marker([38.996831, -0.165587]).bindPopup('This is Denver, CO.'),
        aurora    = L.marker([38.996815, -0.165532]).bindPopup('This is Aurora, CO.'),
        golden    = L.marker([38.996819, -0.165682]).bindPopup('This is Golden, CO.'),
        walway = L.marker([38.996838, -0.165510]).bindPopup('This is Littleton, CO.'),
        manises    = L.marker([38.996836, -0.165587]).bindPopup('This is Denver, CO.'),
        xirivella    = L.marker([38.996825, -0.165512]).bindPopup('This is Aurora, CO.'),
        bcristo    = L.marker([38.996818, -0.165682]).bindPopup('This is Golden, CO.');

    var cities = L.layerGroup([littleton, denver, aurora, golden]);
    var ciudades = L.layerGroup ([walway, manises, xirivella, bcristo]);
    var baseMaps = {
        "Cities": cities,
        "Ciudades" : ciudades
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
    heatmapLayer.setData(testData);
    // make accessible for debugging
    layer = heatmapLayer;

    L.control.layers(null, baseMaps).addTo(map);



    /*

        var addressPoints ={
            max: 8,
            data: [
            {lat:38.996786, long:-0.164808, count: 1},
                {lat:38.996600, long:-0.164820, count: 3},
                {lat:38.996227, long: -0.164698, count: 2},
                {lat:38.996334, long:-0.164814, count: 1},
                {lat: 38.995099, long: -0.164489,count: 2},
                {lat: 38.995515, long: -0.164713, count:1},
                {lat:38.994610, long:-0.163643, count: 3}
        ]};

        var cfg = {
            // radius should be small ONLY if scaleRadius is true (or small radius is intended)
            // if scaleRadius is false it will be the constant radius used in pixels
            "radius": 2,
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
            lngField: 'long',
            // which field name in your data represents the data value - default "value"
            valueField: 'count'
        };

        var heatmapLayer = new HeatmapOverlay(cfg);


        var littleton = L.marker([38.996834, -0.165511]).bindPopup('This is Littleton, CO.'),
            denver    = L.marker([38.996831, -0.165587]).bindPopup('This is Denver, CO.'),
            aurora    = L.marker([38.996815, -0.165532]).bindPopup('This is Aurora, CO.'),
            golden    = L.marker([38.996819, -0.165682]).bindPopup('This is Golden, CO.'),
            walway = L.marker([38.996838, -0.165510]).bindPopup('This is Littleton, CO.'),
            manises    = L.marker([38.996836, -0.165587]).bindPopup('This is Denver, CO.'),
            xirivella    = L.marker([38.996825, -0.165512]).bindPopup('This is Aurora, CO.'),
            bcristo    = L.marker([38.996818, -0.165682]).bindPopup('This is Golden, CO.');

        var cities = L.layerGroup([littleton, denver, aurora, golden]);
        var ciudades = L.layerGroup ([walway, manises, xirivella, bcristo]);


        //var map = L.map('map').setView([38.996810, -0.165582], 12);

        var map = L.map('map', {
            center: [38.996810, -0.165582],
            zoom: 12,
            layers: [ciudades, heatmapLayer]
        });


         var baseMaps = {
             "Cities": cities,
             "Ciudades" : ciudades,
             "Colores" : heatmapLayer
         };



        var tiles = L.tileLayer('http://{s}.tile.osm.org/{z}/{x}/{y}.png', {
            attribution: '&copy; <a href="http://osm.org/copyright">OpenStreetMap</a> contributors',
        }).addTo(map);

        L.control.layers(null, baseMaps).addTo(map);


        addressPoints = addressPoints.map(function (p) {
            return [p[0], p[1], p[2]]
        });


        var heat = L.heatLayer(addressPoints.data).addTo(map);
        */

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
