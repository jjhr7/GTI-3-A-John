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

<script src="https://cdn.jsdelivr.net/npm/heatmapjs@2.0.2/heatmap.js"></script>
<script src="https://cdn.jsdelivr.net/npm/leaflet-heatmap@1.0.0/leaflet-heatmap.js"></script>


<script src="http://code.jquery.com/jquery-1.9.1.min.js"></script>
<script src="http://code.jquery.com/ui/1.9.2/jquery-ui.js"></script>

<!-- Include this library for mobile touch support  -->
<script src="http://cdnjs.cloudflare.com/ajax/libs/jqueryui-touch-punch/0.2.2/jquery.ui.touch-punch.min.js"></script>


<!-- Script para que el slider funcione correctamente -->
<script >

    L.Control.SliderControl = L.Control.extend({
        options: {
            position: 'bottomright',
            layers: null,
            timeAttribute: 'time',
            isEpoch: false,     // whether the time attribute is seconds elapsed from epoch
            startTimeIdx: 0,    // where to start looking for a timestring
            timeStrLength: 19,  // the size of  yyyy-mm-dd hh:mm:ss - if millis are present this will be larger
            maxValue: -1,
            minValue: 0,
            showAllOnStart: false,
            markers: null,
            range: false,
            follow: false,
            sameDate: false,
            alwaysShowDate : false,
            rezoom: null
        },

        initialize: function (options) {
            L.Util.setOptions(this, options);
            this._layer = this.options.layer;

        },

        extractTimestamp: function(time, options) {
            if (options.isEpoch) {
                time = (new Date(parseInt(time))).toString(); // this is local time
            }
            return time.substr(options.startTimeIdx, options.startTimeIdx + options.timeStrLength);
        },

        setPosition: function (position) {
            var map = this._map;

            if (map) {
                map.removeControl(this);
            }

            this.options.position = position;

            if (map) {
                map.addControl(this);
            }
            this.startSlider();
            return this;
        },

        onAdd: function (map) {
            this.options.map = map;

            // Create a control sliderContainer with a jquery ui slider
            var sliderContainer = L.DomUtil.create('div', 'slider', this._container);
            $(sliderContainer).append('<div id="leaflet-slider" style="width:200px"><div class="ui-slider-handle"></div><div id="slider-timestamp" style="width:200px; margin-top:13px; background-color:#FFFFFF; text-align:center; border-radius:5px;"></div></div>');
            //Prevent map panning/zooming while using the slider
            $(sliderContainer).mousedown(function () {
                map.dragging.disable();
            });
            $(document).mouseup(function () {
                map.dragging.enable();
                //Hide the slider timestamp if not range and option alwaysShowDate is set on false
                if (options.range || !options.alwaysShowDate) {
                    $('#slider-timestamp').html('');
                }
            });

            var options = this.options;
            this.options.markers = [];

            //If a layer has been provided: calculate the min and max values for the slider
            if (this._layer) {
                var index_temp = 0;
                this._layer.eachLayer(function (layer) {
                    options.markers[index_temp] = layer;
                    ++index_temp;
                });
                options.maxValue = index_temp - 1;
                this.options = options;
            } else {
                console.log("Error: You have to specify a layer via new SliderControl({layer: your_layer});");
            }
            return sliderContainer;
        },

        onRemove: function (map) {
            //Delete all markers which where added via the slider and remove the slider div
            for (i = this.options.minValue; i <= this.options.maxValue; i++) {
                map.removeLayer(this.options.markers[i]);
            }
            $('#leaflet-slider').remove();

            // unbind listeners to prevent memory leaks
            $(document).off("mouseup");
            $(".slider").off("mousedown");
        },

        startSlider: function () {
            _options = this.options;
            _extractTimestamp = this.extractTimestamp
            var index_start = _options.minValue;
            if(_options.showAllOnStart){
                index_start = _options.maxValue;
                if(_options.range) _options.values = [_options.minValue,_options.maxValue];
                else _options.value = _options.maxValue;
            }
            $("#leaflet-slider").slider({
                range: _options.range,
                value: _options.value,
                values: _options.values,
                min: _options.minValue,
                max: _options.maxValue,
                sameDate: _options.sameDate,
                step: 1,
                slide: function (e, ui) {
                    var map = _options.map;
                    var fg = L.featureGroup();
                    if(!!_options.markers[ui.value]) {
                        // If there is no time property, this line has to be removed (or exchanged with a different property)
                        if(_options.markers[ui.value].feature !== undefined) {
                            if(_options.markers[ui.value].feature.properties[_options.timeAttribute]){
                                if(_options.markers[ui.value]) $('#slider-timestamp').html(
                                    _extractTimestamp(_options.markers[ui.value].feature.properties[_options.timeAttribute], _options));
                            }else {
                                console.error("Time property "+ _options.timeAttribute +" not found in data");
                            }
                        }else {
                            // set by leaflet Vector Layers
                            if(_options.markers [ui.value].options[_options.timeAttribute]){
                                if(_options.markers[ui.value]) $('#slider-timestamp').html(
                                    _extractTimestamp(_options.markers[ui.value].options[_options.timeAttribute], _options));
                            }else {
                                console.error("Time property "+ _options.timeAttribute +" not found in data");
                            }
                        }

                        var i;
                        // clear markers
                        for (i = _options.minValue; i <= _options.maxValue; i++) {
                            if(_options.markers[i]) map.removeLayer(_options.markers[i]);
                        }
                        if(_options.range){
                            // jquery ui using range
                            for (i = ui.values[0]; i <= ui.values[1]; i++){
                                if(_options.markers[i]) {
                                    map.addLayer(_options.markers[i]);
                                    fg.addLayer(_options.markers[i]);
                                }
                            }
                        }else if(_options.follow){
                            for (i = ui.value - _options.follow + 1; i <= ui.value ; i++) {
                                if(_options.markers[i]) {
                                    map.addLayer(_options.markers[i]);
                                    fg.addLayer(_options.markers[i]);
                                }
                            }
                        }else if(_options.sameDate){
                            var currentTime;
                            if (_options.markers[ui.value].feature !== undefined) {
                                currentTime = _options.markers[ui.value].feature.properties.time;
                            } else {
                                currentTime = _options.markers[ui.value].options.time;
                            }
                            for (i = _options.minValue; i <= _options.maxValue; i++) {
                                if(_options.markers[i].options.time == currentTime) map.addLayer(_options.markers[i]);
                            }
                        }else{
                            for (i = _options.minValue; i <= ui.value ; i++) {
                                if(_options.markers[i]) {
                                    map.addLayer(_options.markers[i]);
                                    fg.addLayer(_options.markers[i]);
                                }
                            }
                        }
                    };
                    if(_options.rezoom) {
                        map.fitBounds(fg.getBounds(), {
                            maxZoom: _options.rezoom
                        });
                    }
                }
            });
            if (!_options.range && _options.alwaysShowDate) {
                $('#slider-timestamp').html(_extractTimeStamp(_options.markers[index_start].feature.properties[_options.timeAttribute], _options));
            }
            for (i = _options.minValue; i <= index_start; i++) {
                _options.map.addLayer(_options.markers[i]);
            }
        }
    });

    L.control.sliderControl = function (options) {
        return new L.Control.SliderControl(options);
    };


</script>



<script>


    /**
     * Descripción de obtenerMedicionDeLasEstaciones. Función que devuelve la medicion de las estaciones oficiales de medida
     * Haciendo una petición a la api oficial
     * @return Response
     */

    /*
    function obtenerMedicionDeLasEstaciones(lat, lon){
        const Http = new XMLHttpRequest();
        const url='http://api.airvisual.com/v2/nearest_city?lat='+lat+'&lon='+lon+'&key=e88b27dd-b65c-4eb6-a258-4b161fa20949';
        Http.open("GET", url);
        Http.send();

        Http.onreadystatechange = (e) => {
            return "Http.responseText"
        }

    }
    var medu=obtenerMedicionDeLasEstaciones(40.136944, 0.165555);

    var estacionPrat = L.marker([40.136944, 0.165555], {icon: fontAwesomeIcon}).bindPopup('Estacion de Prat de Cabanes: '+  medu),
        estacionDenia = L.marker([38.67194, 0.0358333]).bindPopup('Estacion de Dénia: '+ obtenerMedicionDeLasEstaciones(38.67194, 0.0358333)),
        estacionAras = L.marker([39.950277, -1.108888]).bindPopup('Estacion de Aras de los olmos:' + obtenerMedicionDeLasEstaciones(39.950277, -1.108888)),
        estacionValencia = L.marker([39.950277, -0.035833]).bindPopup('Estacion de Valencia: '+ obtenerMedicionDeLasEstaciones(39.950277, -0.035833)),
        estacionTorrevieja = L.marker([38.00833, -0.658611]).bindPopup('Estacion de Torrevieja: '+ obtenerMedicionDeLasEstaciones(38.00833, -0.658611));


    /*
/*
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

     */


    /**
     * Descripción de obtenerMedicionDeLasEstaciones. Función que devuelve la medicion de las estaciones oficiales de medida
     * Haciendo una petición a la api oficial
     * @return Response
     */

    async function obtenerMedicionDeLasEstaciones(lat, lon){
        /*    const Http = new XMLHttpRequest();
            const url='http://api.airvisual.com/v2/nearest_city?lat='+lat+'&lon='+lon+'&key=e88b27dd-b65c-4eb6-a258-4b161fa20949';
            Http.open("GET", url);
        try{

            Http.send();

            return new Promise(resolve => {
                Http.onreadystatechange = (e) => {
                    const gei = JSON.parse(Http.responseText);
                    console.log(gei)

                    resolve(gei)
                }
            })
        } catch (e) {*/
            var fakeadito = {
                 "status": "success",
                 "data": {
                     "city": "Valencia",
                     "state": "Valencia",
                     "country": "Spain",
                     "location": {
                         "type": "Point",
                         "coordinates": [
                             -0.37739,
                             39.46975
                         ]
                     },
                     "current": {
                         "weather": {
                             "ts": "2022-01-12T16:00:00.000Z",
                             "tp": 14,
                             "pr": 1026,
                             "hu": 66,
                             "ws": 2.24,
                             "wd": 90,
                             "ic": "02d"
                         },
                         "pollution": {
                             "ts": "2022-01-12T13:00:00.000Z",
                             "aqius": 26,
                             "mainus": "o3",
                             "aqicn": 20,
                             "maincn": "o3"
                         }
                     }
                 }
             };
            resolve(fakeadito)
        //}


    }


    async function getMediciones(){

        var fakeadito = {
            "status": "success",
            "data": {
                "city": "Valencia",
                "state": "Valencia",
                "country": "Spain",
                "location": {
                    "type": "Point",
                    "coordinates": [
                        -0.37739,
                        39.46975
                    ]
                },
                "current": {
                    "weather": {
                        "ts": "2022-01-12T16:00:00.000Z",
                        "tp": 14,
                        "pr": 1026,
                        "hu": 66,
                        "ws": 2.24,
                        "wd": 90,
                        "ic": "02d"
                    },
                    "pollution": {
                        "ts": "2022-01-12T13:00:00.000Z",
                        "aqius": 26,
                        "mainus": "o3",
                        "aqicn": 20,
                        "maincn": "o3"
                    }
                }
            }
        };



        try{
            const prat = await obtenerMedicionDeLasEstaciones(40.136944, 0.165555);
            const denia =  await obtenerMedicionDeLasEstaciones(38.67194, 0.0358333);
            const aras =  await obtenerMedicionDeLasEstaciones(39.950277, -1.108888);
            const valencia = await obtenerMedicionDeLasEstaciones(39.950277, -0.035833);
            const torrevieja = await obtenerMedicionDeLasEstaciones(38.00833, -0.658611);

            return [prat.data.current,denia.data.current,aras.data.current,valencia.data.current,torrevieja.data.current];
        }catch (e) {
            return [ fakeadito.data.current, fakeadito.data.current, fakeadito.data.current, fakeadito.data.current, fakeadito.data.current]
        }

    }




    async function inicializarMapa(prat, denia, aras, valencia, torrevieja) {


        var resultado;
        var array;
        var arrayDate;
        var m1;
        var basemaps2;
        var arrayCO;

        var testDataCO = {
            max: 8,
            data: []
        };


        var estacionesIcon = new L.Icon({
            iconUrl: 'https://raw.githubusercontent.com/pointhi/leaflet-color-markers/master/img/marker-icon-2x-green.png',
            shadowUrl: 'https://cdnjs.cloudflare.com/ajax/libs/leaflet/0.7.7/images/marker-shadow.png',
            iconSize: [25, 41],
            iconAnchor: [12, 41],
            popupAnchor: [1, -34],
            shadowSize: [41, 41]
        });

        var COIcon = new L.Icon({
            iconUrl: 'https://raw.githubusercontent.com/pointhi/leaflet-color-markers/master/img/marker-icon-2x-violet.png',
            shadowUrl: 'https://cdnjs.cloudflare.com/ajax/libs/leaflet/0.7.7/images/marker-shadow.png',
            iconSize: [25, 41],
            iconAnchor: [12, 41],
            popupAnchor: [1, -34],
            shadowSize: [41, 41]
        });

        var SOIcon = new L.Icon({
            iconUrl: 'https://raw.githubusercontent.com/pointhi/leaflet-color-markers/master/img/marker-icon-2x-yellow.png',
            shadowUrl: 'https://cdnjs.cloudflare.com/ajax/libs/leaflet/0.7.7/images/marker-shadow.png',
            iconSize: [25, 41],
            iconAnchor: [12, 41],
            popupAnchor: [1, -34],
            shadowSize: [41, 41]
        });



        var estacionPrat = L.marker([40.136944, 0.165555], {icon: estacionesIcon}).bindPopup('Estacion de Prat de Cabanes:' + '\r' + ' Humedad: ' + prat.weather.hu + "\r" +
                'Temperatura: ' + prat.weather.tp + "\r" +
                'Calidad del aire: ' + prat.pollution.aqicn + "\r"),
            estacionDenia = L.marker([38.67194, 0.0358333],  {icon: estacionesIcon}).bindPopup('Estacion de Dénia: ' + '\r' + ' Humedad: ' + denia.weather.hu + "\r" +
                'Temperatura: ' + denia.weather.tp + "\r" +
                'Calidad del aire: ' + denia.pollution.aqicn + "\r"),
            estacionAras = L.marker([39.950277, -1.108888], {icon: estacionesIcon}).bindPopup('Estacion de Aras de los olmos:' + '\r' + ' Humedad: ' + aras.weather.hu + "\r" +
                'Temperatura: ' + aras.weather.tp + "\r" +
                'Calidad del aire: ' + aras.pollution.aqicn + "\r"),
            estacionValencia = L.marker([39.950277, -0.035833], {icon: estacionesIcon}).bindPopup('Estacion de Valencia: ' + '\r' + ' Humedad: ' + valencia.weather.hu + "\r" +
                'Temperatura: ' + valencia.weather.tp + "\r" +
                'Calidad del aire: ' + valencia.pollution.aqicn + "\r"),
            estacionTorrevieja = L.marker([38.00833, -0.658611], {icon: estacionesIcon}).bindPopup('Estacion de Torrevieja: ' + '\r' + ' Humedad: ' + torrevieja.weather.hu + "\r" +
                'Temperatura: ' + torrevieja.weather.tp + "\r" +
                'Calidad del aire: ' + torrevieja.pollution.aqicn + "\r");

        var estacionesMedica = L.layerGroup([estacionDenia, estacionPrat, estacionValencia, estacionAras, estacionTorrevieja]);


        var LeafIcon = L.Icon.extend({
            options: {
                iconSize: [38, 95],
                shadowSize: [50, 64],
                iconAnchor: [22, 94],
                shadowAnchor: [4, 62],
                popupAnchor: [-3, -76]
            }
        });


        var greenIcon = new LeafIcon({
            iconUrl: 'http://leafletjs.com/examples/custom-icons/leaf-green.png',
            shadowUrl: 'http://leafletjs.com/examples/custom-icons/leaf-shadow.png'
        })


        var sliderControl = null;



        var testData = {
            max: 8,
            data: [{lat: 38.926810, lng:-0.165582, count: 3},{lat: 38.996860, lng:-0.165532, count: 2},{lat: 38.996810, lng:-0.145582, count: 3},{lat: 38.996857, lng:-0.165588, count: 1},{lat: 38.996834, lng:-0.165533, count: 1},{lat: 60.8, lng:11.1, count: 1}]
        };

        var medicionIAQ1 = L.marker([38.966623, -0.175211], {time: "2013-01-22 07:42:26"}).bindPopup('La calidad del aire en este punto es a'),
            medicionIAQ2    = L.marker([38.992851, -0.195587], {time: "2013-01-22 07:42:26"}).bindPopup('La calidad del aire en este punto es b'),
            medicionIAQ3    = L.marker([38.991045, -0.165532], {time: "2013-01-22 08:42:26"}).bindPopup('La calidad del aire en este punto es c'),
            medicionIAQ4    = L.marker([38.994319, -0.161632], {time: "2013-01-22 08:42:26"}).bindPopup('La calidad del aire en este punto es d'),
            medicionIAQ5    = L.marker([38.956838, -0.178382], {time: "2013-01-22 09:00:26"}).bindPopup('La calidad del aire en este punto es e'),
            medicionIAQ6    = L.marker([38.986419, -0.165682], {time: "2013-01-22 10:00:26"}).bindPopup('La calidad del aire en este punto es f'),
            medicionIAQ7    = L.marker([38.983519, -0.185682], {time: "2013-01-22 11:00:26"}).bindPopup('La calidad del aire en este punto es g'),
            medicionIAQ8    = L.marker([38.996813, -0.175682], {time: "2013-01-22 11:06:26"}).bindPopup('La calidad del aire en este punto es h'),
            medicionIAQ9    = L.marker([38.956719, -0.175562], {time: "2013-01-22 11:10:26"}).bindPopup('La calidad del aire en este punto es i'),
            medicionIAQ10    = L.marker([38.976829, -0.175212], {time: "2013-01-22 11:20:26"}).bindPopup('La calidad del aire en este punto es j'),
            medicionIAQ11   = L.marker([38.986859, -0.168862], {time: "2013-01-22 11:30:29"}).bindPopup('La calidad del aire en este punto es k'),
            medicionIAQ12    = L.marker([38.992229, -0.175342], {time: "2013-01-22 12:03:29"}).bindPopup('La calidad del aire en este punto es l'),
            medicionIAQ13    = L.marker([38.984544, -0.165634], {time: "2013-01-22 12:23:29"}).bindPopup('La calidad del aire en este punto es m'),
            medicionIAQ14    = L.marker([38.976349, -0.182682], {time: "2013-01-22 12:29:29"}).bindPopup('La calidad del aire en este punto es n'),
            medicionIAQ15    = L.marker([38.968223, -0.177682], {time: "2013-01-22 12:37:29"}).bindPopup('La calidad del aire en este punto es o'),
            medicionIAQ16    = L.marker([38.998224, -0.177683], {time: "2013-01-22 12:55:29"}).bindPopup('La calidad del aire en este punto es p'),
            medicionIAQ17    = L.marker([38.988243, -0.177682], {time: "2013-01-23 13:03:29"}).bindPopup('La calidad del aire en este punto es q'),
            medicionIAQ18    = L.marker([38.789987, -0.189682], {time: "2013-01-23 13:30:29"}).bindPopup('La calidad del aire en este punto es r'),
            medicionIAQ19    = L.marker([38.954423, -0.177682], {time: "2013-01-23 14:03:29"}).bindPopup('La calidad del aire en este punto es s'),
            medicionIAQ20    = L.marker([38.969280, -0.187316], {time: "2013-01-23 15:03:29"}).bindPopup('La calidad del aire en este punto es t'),
            medicionIAQ21    = L.marker([38.994423, -0.165434], {time: "2013-01-23 16:03:29"}).bindPopup('La calidad del aire en este punto es u'),
            medicionIAQ22    = L.marker([38.893223, -0.167682], {time: "2013-01-23 16:03:29"}).bindPopup('La calidad del aire en este punto es v'),
            medicionIAQ23    = L.marker([38.988623, -0.178942], {time: "2013-01-23 16:30:29"}).bindPopup('La calidad del aire en este punto es w'),
            medicionIAQ24    = L.marker([38.996723, -0.156632], {time: "2013-01-23 18:03:29"}).bindPopup('La calidad del aire en este punto es x'),
            medicionIAQ25    = L.marker([38.993423, -0.176341], {time: "2013-01-23 19:03:29"}).bindPopup('La calidad del aire en este punto es y'),
            medicionIAQ26    = L.marker([38.979880, -0.189316], {time: "2013-01-23 20:03:29"}).bindPopup('La calidad del aire en este punto es z'),


            medicionSO21 = L.marker([38.996838, -0.165510], {icon: SOIcon},{time: "2013-01-22 11:30:29"}).bindPopup('El valor de SO2 es: 1'),
            medicionSO22    = L.marker([38.896833, -0.165514], {icon: SOIcon}, {time: "2013-01-22 12:30:29"}).bindPopup('El valor de SO2 es: 2'),
            medicionSO23    = L.marker([38.966523, -0.165420], {icon: SOIcon}, {time: "2013-01-22 13:30:29"}).bindPopup('El valor de SO2 es: 3'),
            medicionSO24    = L.marker([38.984544, -0.165720], {icon: SOIcon}, {time: "2013-01-22 14:30:29"}).bindPopup('El valor de SO2 es: 5'),
            medicionSO25    = L.marker([38.987619, -0.165827], {icon: SOIcon}, {time: "2013-01-22 15:30:29"}).bindPopup('El valor de SO2 es: 4'),
            medicionSO26    = L.marker([38.972356, -0.165332], {icon: SOIcon}, {time: "2013-01-22 16:30:29"}).bindPopup('El valor de SO2 es: 6'),
            medicionSO27    = L.marker([38.899833, -0.166682], {icon: SOIcon}, {time: "2013-01-22 17:30:29"}).bindPopup('El valor de SO2 es: 7'),
            medicionSO28    = L.marker([38.936128, -0.167882], {icon: SOIcon}, {time: "2013-01-22 18:30:29"}).bindPopup('El valor de SO2 es: 8'),
            medicionSO29    = L.marker([38.924763, -0.166542], {icon: SOIcon}, {time: "2013-01-22 19:30:29"}).bindPopup('El valor de SO2 es: 9'),
            medicionSO210    = L.marker([38.992318, -0.163282], {icon: SOIcon}, {time: "2013-01-22 20:30:29"}).bindPopup('El valor de SO2 es: '),
            medicionSO211    = L.marker([38.976118, -0.163342], {icon: SOIcon}, {time: "2013-01-22 21:30:29"}).bindPopup('El valor de SO2 es: '),
            medicionSO12    = L.marker([38.989818, -0.166642], {icon: SOIcon}, {time: "2013-01-22 22:30:29"}).bindPopup('El valor de SO2 es: ');


        var IAQ = L.layerGroup([medicionIAQ1, medicionIAQ2, medicionIAQ3, medicionIAQ4, medicionIAQ5, medicionIAQ6,medicionIAQ7, medicionIAQ8, medicionIAQ9, medicionIAQ10, medicionIAQ11, medicionIAQ12, medicionIAQ13, medicionIAQ14, medicionIAQ15, medicionIAQ16, medicionIAQ17, medicionIAQ18, medicionIAQ19, medicionIAQ20, medicionIAQ21, medicionIAQ22, medicionIAQ23, medicionIAQ24,medicionIAQ25, medicionIAQ26]);
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
            layers: [baseLayer,heatmapLayer]

        });


        $( document ).ready(function() {

            const url = 'http://vmi621282.contaboserver.net/api/v1/mediciones/convert/filter';
            const http = new XMLHttpRequest();

            http.open("GET", url);

            /*
            http.setRequestHeader("Accept", "application/json");
            http.setRequestHeader("X-Requested-With", "XMLHttpRequest");
            http.setRequestHeader("Authorization", "Bearer eyJ0eXAiOiJKV1QiLCJhbGciOiJSUzI1NiJ9.eyJhdWQiOiIxIiwianRpIjoiZTIzYzVkNjMyNDM4MDc4NWFiNjgzMjRjM2NkZGU5NGE1NjdjNjNhZTViOTRmMWRjNTkzZDIyM2EyMDk1YTdlMWU2NDUwOGI1NTI2NTFiNzYiLCJpYXQiOjE2NDE4Mjk5MDQuNTEyMDQ1LCJuYmYiOjE2NDE4Mjk5MDQuNTEyMDUyLCJleHAiOjE2NzMzNjU5MDQuNTA3NjgxLCJzdWIiOiIxIiwic2NvcGVzIjpbXX0.bJlbDSxOG_CHb4b0GH6RAvgZJhyMTCU-gU9kJFPLmynnps4v4_RlUTsVE2XUpDPp1jPuwchL87dqxlWa3wqR6oYj-xDZvEZDlSLJyVwFdNczk2lP8xBpsG6n32hZihGG2-mKTH65O1O9ngjZhWxnWFGOwxluQJKnZhb8NqNB9NGZ7rTgKpeIOlelr7CAhA5JnC0TlcIKQEr2YrIsOush7LrczOKA_-yihBmdbgh1QH48qBdqWbijxaXQf025rk_fz6G5-vY_LiwV9oRUE8MstEimVSJd3zGjM63QTgoBXXBEg3trIZpiQUYTuSJRPm2kg0LaygncRyk204RNaqvW5nynqMOxC7EQgVWQkEZmHOx0bGtv2UnZvpiofdg_iCm7N7XOXwRdoL_OThrl6dU3Wok5o4HITzlfn5ipFFLz_rNXTsX_GpPpcOEopKHruWeaeMsyxR_2rumQNlBLhafhN7XVB7KyQ_cDw6SLaEH9UROZhUlGcrGcPb2Z_oZ3vrFTaV0lVveX4u_s3Ax3QbyyzGfDcKajlzEZJ8dZIhTwzH1sp1oZmPQ_NHL7yd8oDzdDykcL6PabyI0MsCH8vhExm5xGOPqmvB8HfQ9UeVx1awaLKchq68gHScO3AKWRTzH6DUovE0gwbqLwvky9uLYfflWoovhx05oPHVdqaixWfsA");

             */
            http.onreadystatechange = function(){

                if(this.readyState == 4 && this.status == 200){
                    resultado = this.response;
                    array = JSON.parse(this.response);
                    //let array = JSON.parse(this.response);
                    array.forEach(item => testDataCO.data.push(item));
                    heatmapLayer.setData(testDataCO);


                    /*for(var i=0; i<array.length; i++){
                        var lat1=array[i].lat;
                        console.log(array[i].lat);
                        var lng1=array[i].lng;
                        var count1=array[i].count;
                        L.marker([lat1, lng1]).bindPopup('La medición es' + count1);
                    }*/
                }
            }

            http.send();


            const url1 = 'http://vmi621282.contaboserver.net/api/v1/mediciones/convert/dates';
            const http1 = new XMLHttpRequest();

            http1.open("GET", url1);
            http1.onreadystatechange = function(){

                if(this.readyState == 4 && this.status == 200){
                    arrayDate = JSON.parse(this.response);
                    var hora='00';
                    var minutos='00';
                    for(var i=0; i<arrayDate.length; i++){
                        m1 = L.marker([arrayDate[i].lat, arrayDate[i].lng], {icon: COIcon}, {time: arrayDate[i].dt+ " " + hora + ":00:00"}).bindPopup('La medición es ' + arrayDate[i].count);
                        hora = Math.floor(Math.random() * (25 - 0) + 0);
                        if(hora<10){
                            hora='0'+hora;
                        }

                        arrayCO.push(m1)
                        
                    }

                    var CO = L.layerGroup ([arrayCO]);
                    basemaps2 = {
                        "Calidad del aire": IAQ,
                        "SO2" : SO2,
                        "Estaciones de medida" : estacionesMedica,
                        "CO" : CO
                    };



                    L.control.layers(null, basemaps2).addTo(map);
                }
            }

            http1.send();

        });



        var sliderControl = L.control.sliderControl({position: "bottomright", layer: IAQ});
        map.addControl(sliderControl);
        sliderControl.startSlider();


        heatmapLayer.setData(testData);
        // make accessible for debugging
        layer = heatmapLayer;


    }




    getMediciones().then(value => {
        inicializarMapa(value[0],value[1],value[2],value[3],value[4]);
    });


</script>

</body>
</html>
