<!DOCTYPE html>
<html>
<head>
    <title>Mapa móvil</title>

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
        body {
            padding: 0;
            margin: 0;
        }
        html, body, #map {
            height: 100%;
        }

        .ghbtns { position: relative; top: 4px; margin-left: 5px; }
        a { color: #0077ff; }
    </style>

    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" />

</head>

<body>

<div id="map"></div>

<!-- <script src="../node_modules/simpleheat/simpleheat.js"></script>
<script src="../src/HeatLayer.js"></script> -->

<script src="../../../public/js/leaflet-heat.js"></script>
<script src="https://cdn.jsdelivr.net/npm/heatmapjs@2.0.2/heatmap.js"></script>
<script src="https://cdn.jsdelivr.net/npm/leaflet-heatmap@1.0.0/leaflet-heatmap.js"></script>


<script>

    /**
     * Descripción de obtenerMedicionDeLasEstaciones. Función que devuelve la medicion de las estaciones oficiales de medida
     * Haciendo una petición a la api oficial
     * @return Response
     */
    public function obtenerMedicionDeLasEstaciones($lat, $lon){
        $url = 'http://api.airvisual.com/v2/nearest_city?lat='.$lat.'&lon='.$lon.'&key=e88b27dd-b65c-4eb6-a258-4b161fa20949';

        $response = Requests::get($url);

        return $response;
    }



    var estacionPrat = L.marker([40.136944, 0.165555]).bindPopup('Estacion de Prat de Cabanes: '+ obtenerMedicionDeLasEstaciones(40.136944, 0.165555)),
        estacionDenia = L.marker([38.67194, 0.0358333]).bindPopup('Estacion de Dénia: '+ obtenerMedicionDeLasEstaciones(38.67194, 0.0358333)),
        estacionAras = L.marker([39.950277, -1.108888]).bindPopup('Estacion de Aras de los olmos:' + obtenerMedicionDeLasEstaciones(39.950277, -1.108888)),
        estacionValencia = L.marker([39.950277, -0.035833]).bindPopup('Estacion de Valencia: '+ obtenerMedicionDeLasEstaciones(39.950277, -0.035833)),
        estacionTorrevieja = L.marker([38.00833, -0.658611]).bindPopup('Estacion de Torrevieja: '+ obtenerMedicionDeLasEstaciones(38.00833, -0.658611));


    var testData = {
        max: 8,
        data: [{lat: 38.926810, lng:-0.165582, count: 3},{lat: 38.996860, lng:-0.165532, count: 2},{lat: 38.996810, lng:-0.145582, count: 3},{lat: 38.996857, lng:-0.165588, count: 1},{lat: 38.996834, lng:-0.165533, count: 1},{lat: 60.8, lng:11.1, count: 1}]
    };

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
    heatmapLayer.setData(testData);
    // make accessible for debugging
    layer = heatmapLayer;

    L.control.layers(null, baseMaps).addTo(map);

    /*
    map.locate({setView: true, maxZoom: 16});

    function onLocationFound(e) {
        var radius = e.accuracy;

        L.marker(e.latlng).addTo(map)
            .bindPopup("You are within " + radius + " meters from this point").openPopup();

        L.circle(e.latlng, radius).addTo(map);
    }

    map.on('locationfound', onLocationFound);

    function onLocationError(e) {
        alert(e.message);
    }

    map.on('locationerror', onLocationError);

     */

   /* var testData = {
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

    */



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

</body>
</html>
