
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
    <link rel="stylesheet" href="http://code.jquery.com/ui/1.9.2/themes/base/jquery-ui.css" type="text/css">
    <link rel="stylesheet" href="http://code.ionicframework.com/ionicons/1.5.2/css/ionicons.min.css">


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
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<script src="../../../public/js/leaflet-heat.js"></script>
<script src="https://cdn.jsdelivr.net/npm/heatmapjs@2.0.2/heatmap.js"></script>
<script src="https://cdn.jsdelivr.net/npm/leaflet-heatmap@1.0.0/leaflet-heatmap.js"></script>


<script src="http://code.jquery.com/jquery-1.9.1.min.js"></script>
<script src="http://code.jquery.com/ui/1.9.2/jquery-ui.js"></script>

<!-- Include this library for mobile touch support  -->
<script src="http://cdnjs.cloudflare.com/ajax/libs/jqueryui-touch-punch/0.2.2/jquery.ui.touch-punch.min.js"></script>

<script src="../../../public/js/SliderControl.js"></script>


<script src="https://github.com/dwilhelm89/LeafletSlider/blob/a797b08d692b9c9deaf5602ebeb99923d8764f5e/SliderControl.js"></script>

<script>

    var LeafIcon = L.Icon.extend({
        options: {
            iconSize:     [38, 95],
            shadowSize:   [50, 64],
            iconAnchor:   [22, 94],
            shadowAnchor: [4, 62],
            popupAnchor:  [-3, -76]
        }
    });


    var greenIcon = new LeafIcon({
        iconUrl: 'http://leafletjs.com/examples/custom-icons/leaf-green.png',
        shadowUrl: 'http://leafletjs.com/examples/custom-icons/leaf-shadow.png'
    })


    var sliderControl = null;
    /**
     * Descripción de obtenerMedicionDeLasEstaciones. Función que devuelve la medicion de las estaciones oficiales de medida
     * Haciendo una petición a la api oficial
     * @return Response
     */
     async function obtenerMedicionDeLasEstaciones(lat, lon){
        const Http = new XMLHttpRequest();
        const url='http://api.airvisual.com/v2/nearest_city?lat='+lat+'&lon='+lon+'&key=e88b27dd-b65c-4eb6-a258-4b161fa20949';
        Http.open("GET", url);
        Http.send();

        return new Promise(resolve => {
            Http.onreadystatechange = (e) => {
                const gei = JSON.parse(Http.responseText);
                console.log(gei)

                resolve(gei)
            }
        })


    }

    async function getMediciones(){
        const prat = await obtenerMedicionDeLasEstaciones(40.136944, 0.165555);
        const denia =  await obtenerMedicionDeLasEstaciones(38.67194, 0.0358333);
        const aras =  await obtenerMedicionDeLasEstaciones(39.950277, -1.108888);
        const valencia = await obtenerMedicionDeLasEstaciones(39.950277, -0.035833);
        const torrevieja = await obtenerMedicionDeLasEstaciones(38.00833, -0.658611);

        return [prat.data.current,denia.data.current,aras.data.current,valencia.data.current,torrevieja.data.current];
    }

    async function inicializarMapa(prat, denia, aras, valencia, torrevieja){

    var marker1 = L.marker([38.996836, -0.165513], {time: "2013-01-22 08:42:26+01"});
    var marker2 = L.marker([38.996838, -0.165510], {time: "2013-01-22 10:00:26+01"});
    var marker3 = L.marker([38.996823, -0.165545], {time: "2013-01-22 10:03:29+01"});

    var pointA = new L.LatLng(38.996832, -0.165511);
    var pointB = new L.LatLng(38.996838, -0.165513);
    var pointList = [pointA, pointB];

    var polyline = new L.Polyline(pointList, {
        time: "2013-01-22 10:24:59+01",
        color: 'red',
        weight: 3,
        opacity: 1,
        smoothFactor: 1
    });

    var testData = {
        max: 8,
        data: [{lat: 38.926810, lng:-0.165582, count: 3},{lat: 38.996860, lng:-0.165532, count: 2},{lat: 38.996810, lng:-0.145582, count: 3},{lat: 38.996857, lng:-0.165588, count: 1},{lat: 38.996834, lng:-0.165533, count: 1},{lat: 60.8, lng:11.1, count: 1}]
    };


        var estacionPrat = L.marker([40.136944, 0.165555]).bindPopup(   'Estacion de Prat de Cabanes:'+ '\r'+' Humedad: '+  prat.weather.hu + "\r" +
                                                                        'Temperatura: ' +   prat.weather.tp + "\r" +
                                                                        'Calidad del aire: ' +   prat.pollution.aqicn + "\r"),
            estacionDenia = L.marker([38.67194, 0.0358333]).bindPopup('Estacion de Dénia: '+ '\r'+' Humedad: '+  denia.weather.hu + "\r" +
                                                                        'Temperatura: ' +   denia.weather.tp + "\r" +
                                                                        'Calidad del aire: ' +   denia.pollution.aqicn + "\r"),
            estacionAras = L.marker([39.950277, -1.108888]).bindPopup('Estacion de Aras de los olmos:'+ '\r'+' Humedad: '+  aras.weather.hu + "\r" +
                                                                        'Temperatura: ' +   aras.weather.tp + "\r" +
                                                                        'Calidad del aire: ' +   aras.pollution.aqicn + "\r"),
            estacionValencia = L.marker([39.950277, -0.035833]).bindPopup('Estacion de Valencia: '+ '\r'+' Humedad: '+  valencia.weather.hu + "\r" +
                                                                            'Temperatura: ' +   valencia.weather.tp + "\r" +
                                                                            'Calidad del aire: ' +   valencia.pollution.aqicn + "\r"),
            estacionTorrevieja = L.marker([38.00833, -0.658611]).bindPopup('Estacion de Torrevieja: '+ '\r'+' Humedad: '+  torrevieja.weather.hu + "\r" +
                                                                            'Temperatura: ' +   torrevieja.weather.tp + "\r" +
                                                                            'Calidad del aire: ' +   torrevieja.pollution.aqicn + "\r");


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
        var estacionesMedica = L.layerGroup ([estacionDenia, estacionPrat, estacionValencia, estacionAras, estacionTorrevieja]);
        var baseMaps = {
            "Calidad del aire": IAQ,
            "SO2" : SO2,
            "Estaciones de medida" : estacionesMedica
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

    }

    getMediciones().then(value => {
        inicializarMapa(value[0],value[1],value[2],value[3],value[4]);
    });

    var map = new L.Map('map', {
        center: new L.LatLng(38.996810, -0.165582),
        zoom: 12,
        layers: [baseLayer,heatmapLayer]


    });


    layerGroup = L.layerGroup([marker1, marker2, marker3, polyline]);


    L.control.layers(null, baseMaps).addTo(map);

    L.control.sliderControl({position: "bottomright", layer: layerGroup}).addTo(map);
    map.addControl(sliderControl);
    sliderControl.startSlider();


    heatmapLayer.setData(testData);
    // make accessible for debugging
    layer = heatmapLayer;






</script>

</body>
</html>
