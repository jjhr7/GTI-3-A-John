<!doctype html>
<html class="no-js" lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>Login | Laravel Admin Starter Kit - Radmin</title>
    <meta name="description" content="">
    <meta name="keywords" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link rel="icon" href="{{ asset('favicon.png') }}" type="image/x-icon" />

    <link href="https://fonts.googleapis.com/css?family=Nunito+Sans:300,400,600,700,800" rel="stylesheet">

    <link rel="stylesheet" href="{{ asset('plugins/bootstrap/dist/css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="path/to/font-awesome/css/font-awesome.min.css">
    <link rel="stylesheet" href="{{ asset('plugins/fontawesome-free/css/all.min.css') }}">
    <link rel="stylesheet" href="{{ asset('plugins/ionicons/dist/css/ionicons.min.css') }}">
    <link rel="stylesheet" href="{{ asset('plugins/icon-kit/dist/css/iconkit.min.css') }}">
    <link rel="stylesheet" href="{{ asset('plugins/perfect-scrollbar/css/perfect-scrollbar.css') }}">
    <link rel="stylesheet" href="{{ asset('dist/css/theme.min.css') }}">
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
    <link rel="stylesheet" href="{{ asset('css/gas-guide.css') }}">
    <script src="{{ asset('src/js/vendor/modernizr-2.8.3.min.js') }}"></script>
</head>

<body>
<!--[if lt IE 8]>
<p class="browserupgrade">You are using an <strong>outdated</strong> browser. Please <a href="http://browsehappy.com/">upgrade your browser</a> to improve your experience.</p>
<![endif]-->
<div class="container-fluid">

    <div class="row align-items-end">
        <div class="col-lg-8">
            <div class="page-header-title">
            </div>
        </div>
        <div class="col-lg-4">
        </div>
    </div>
    <div class="row clearfix box-guide">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <a href="#"><i class="fas fa-arrow-left btn-lg blue"></i></a>
                    <h3 class="titulo-guide">{{ __('Información sobre gases medidos')}}</h3></div>
                <div class="card-body">
                    <div class="row md-12">
                        <div class="col boxIcono"><a href="#"><img class="box-gas1" id="co2" onclick="datosCO2()" src="{{asset('img/gas-guide-img/co2.png')}}"></a></div>
                        <div class="col boxIcono"><a href="#"><img class="box-gas2" id="bencenopireno" onclick="datosBencenopireno()" src="{{asset('img/gas-guide-img/h2s.png')}}"></a></div>
                        <div class="col boxIcono"><a href="#"><img class="box-gas3" id="no2" onclick="datosNO2()" src="{{asset('img/gas-guide-img/no2.png')}}"></a></div>
                        <div class="col boxIcono"><a href="#"><img class="box-gas4" id="so2" onclick="datosSO2()" src="{{asset('img/gas-guide-img/so2.png')}}"></a></div>
                        <div class="col boxIcono"><a href="#"><img class="box-gas5" id="o3" onclick="datosO3()" src="{{asset('img/gas-guide-img/o3.png')}}"></a></div>
                        <div class="col boxIcono"><a href="#"><img class="box-gas1" id="pm25" onclick="datosPm25()" src="{{asset('img/gas-guide-img/pm25.png')}}"></a></div>
                        <div class="col boxIcono"><a href="#"><img class="box-gas2" id="pm10" onclick="datosPm10()" src="{{asset('img/gas-guide-img/pm10.png')}}"></a></div>
                        <div class="col boxIcono"><a href="#"><img class="box-gas3" id="plomo" onclick="datosPlomo()" src="{{asset('img/gas-guide-img/pb.png')}}"></a></div>
                        <div class="col boxIcono"><a href="#"><img class="box-gas4" id="benceno" onclick="datosBenceno()" src="{{asset('img/gas-guide-img/benceno.png')}}"></a></div>
                        <div class="col boxIcono"><a href="#"><img class="box-gas5" id="arsenico" onclick="datosArsenico()" src="{{asset('img/gas-guide-img/arsenico.png')}}"></a></div>
                    </div>
                    <div class="row mb-12">
                        <div class="col-5 boxIcono"><a href="#"><img class="imgGas" id="imagenGas" src="{{asset('img/gas-guide-img/humo.png')}}"></a></div>
                        <div class="col-7">
                            <div class="row md-12">
                                    <div class="col-md boxInfo">
                                        <h5 class="tituloBox">Nombre</h5>
                                        <h6 class="datosBox" id="nombreGas">Dióxido de carbono</h6>
                                    </div>
                                    <div class="col-md boxInfo">
                                        <h5 class="tituloBox">Valor límite</h5>
                                        <h6 class="datosBox" id="valorLimiteGas">10 mg/m3 por 1h</h6>
                                    </div>
                            </div>
                            <div class="row md-12">
                                <div class="col-md boxInfo">
                                    <h5 class="tituloBox">Valor de información</h5>
                                    <h6 class="datosBox" id="valorInfoGas">Entre 500 y 800 ppm: calidad de aire interior mode...</h6>
                                </div>
                                <div class="col-md boxInfo">
                                    <h5 class="tituloBox">Valor de alerta</h5>
                                    <h6 class="datosBox" id="valorAlertaGas">Nivel superior a 1200 ppm: calidad de aire interior...</h6>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row md-12">
                        <div class="col-md boxInfo">
                            <h5 class="tituloBox">Descripción</h5>
                            <h6 class="datosBox" id="descGas">Es un gas incoloro e inodoro cuyo origen puede est...</h6>
                        </div>

                </div>
            </div>
        </div>
    </div>
</div>

<script type="text/javascript">
    function datosCO2() {
        document.getElementById("nombreGas").innerText = "{{$gases[0]->name}}";
        document.getElementById("valorLimiteGas").innerText = "{{$gases[0]->fix_values}}";
        document.getElementById("valorInfoGas").innerText = "{{$gases[0]->information_values}}";
        document.getElementById("valorAlertaGas").innerText = "{{$gases[0]->alert_values}}";
        document.getElementById("descGas").innerText = "{{$gases[0]->description}}";
        document.getElementById("imagenGas").setAttribute("src", "{{$gases[0]->route_image}}");
        document.getElementById("co2").classList.add("borderColor");
        document.getElementById("bencenopireno").classList.remove("borderColor");
        document.getElementById("no2").classList.remove("borderColor");
        document.getElementById("so2").classList.remove("borderColor");
        document.getElementById("o3").classList.remove("borderColor");
        document.getElementById("pm25").classList.remove("borderColor");
        document.getElementById("pm10").classList.remove("borderColor");
        document.getElementById("plomo").classList.remove("borderColor");
        document.getElementById("benceno").classList.remove("borderColor");
        document.getElementById("arsenico").classList.remove("borderColor");


    }

    function datosBencenopireno() {
        document.getElementById("nombreGas").innerText = "{{$gases[9]->name}}";
        document.getElementById("valorLimiteGas").innerText = "{{$gases[9]->fix_values}}";
        document.getElementById("valorInfoGas").innerText = "{{$gases[9]->information_values}}";
        document.getElementById("valorAlertaGas").innerText = "{{$gases[9]->alert_values}}";
        document.getElementById("descGas").innerText = "{{$gases[9]->description}}";
        document.getElementById("imagenGas").setAttribute("src", "{{$gases[9]->route_image}}");
        document.getElementById("co2").classList.remove("borderColor");
        document.getElementById("bencenopireno").classList.add("borderColor");
        document.getElementById("no2").classList.remove("borderColor");
        document.getElementById("so2").classList.remove("borderColor");
        document.getElementById("o3").classList.remove("borderColor");
        document.getElementById("pm25").classList.remove("borderColor");
        document.getElementById("pm10").classList.remove("borderColor");
        document.getElementById("plomo").classList.remove("borderColor");
        document.getElementById("benceno").classList.remove("borderColor");
        document.getElementById("arsenico").classList.remove("borderColor");

    }

    function datosNO2() {
        document.getElementById("nombreGas").innerText = "{{$gases[4]->name}}";
        document.getElementById("valorLimiteGas").innerText = "{{$gases[4]->fix_values}}";
        document.getElementById("valorInfoGas").innerText = "{{$gases[4]->information_values}}";
        document.getElementById("valorAlertaGas").innerText = "{{$gases[4]->alert_values}}";
        document.getElementById("descGas").innerText = "{{$gases[4]->description}}";
        document.getElementById("imagenGas").setAttribute("src", "{{$gases[4]->route_image}}");
        document.getElementById("co2").classList.remove("borderColor");
        document.getElementById("bencenopireno").classList.remove("borderColor");
        document.getElementById("no2").classList.add("borderColor");
        document.getElementById("so2").classList.remove("borderColor");
        document.getElementById("o3").classList.remove("borderColor");
        document.getElementById("pm25").classList.remove("borderColor");
        document.getElementById("pm10").classList.remove("borderColor");
        document.getElementById("plomo").classList.remove("borderColor");
        document.getElementById("benceno").classList.remove("borderColor");
        document.getElementById("arsenico").classList.remove("borderColor");
    }

    function datosSO2() {
        document.getElementById("nombreGas").innerText = "{{$gases[5]->name}}";
        document.getElementById("valorLimiteGas").innerText = "{{$gases[5]->fix_values}}";
        document.getElementById("valorInfoGas").innerText = "{{$gases[5]->information_values}}";
        document.getElementById("valorAlertaGas").innerText = "{{$gases[5]->alert_values}}";
        document.getElementById("descGas").innerText = "{{$gases[5]->description}}";
        document.getElementById("imagenGas").setAttribute("src", "{{$gases[5]->route_image}}");
        document.getElementById("co2").classList.remove("borderColor");
        document.getElementById("bencenopireno").classList.remove("borderColor");
        document.getElementById("no2").classList.remove("borderColor");
        document.getElementById("so2").classList.add("borderColor");
        document.getElementById("o3").classList.remove("borderColor");
        document.getElementById("pm25").classList.remove("borderColor");
        document.getElementById("pm10").classList.remove("borderColor");
        document.getElementById("plomo").classList.remove("borderColor");
        document.getElementById("benceno").classList.remove("borderColor");
        document.getElementById("arsenico").classList.remove("borderColor");

    }

    function datosO3() {
        document.getElementById("nombreGas").innerText = "{{$gases[3]->name}}";
        document.getElementById("valorLimiteGas").innerText = "{{$gases[3]->fix_values}}";
        document.getElementById("valorInfoGas").innerText = "{{$gases[3]->information_values}}";
        document.getElementById("valorAlertaGas").innerText = "{{$gases[3]->alert_values}}";
        document.getElementById("descGas").innerText = "{{$gases[3]->description}}";
        document.getElementById("imagenGas").setAttribute("src", "{{$gases[3]->route_image}}");
        document.getElementById("co2").classList.remove("borderColor");
        document.getElementById("bencenopireno").classList.remove("borderColor");
        document.getElementById("no2").classList.remove("borderColor");
        document.getElementById("so2").classList.remove("borderColor");
        document.getElementById("o3").classList.add("borderColor");
        document.getElementById("pm25").classList.remove("borderColor");
        document.getElementById("pm10").classList.remove("borderColor");
        document.getElementById("plomo").classList.remove("borderColor");
        document.getElementById("benceno").classList.remove("borderColor");
        document.getElementById("arsenico").classList.remove("borderColor");

    }

    function datosPm25() {
        document.getElementById("nombreGas").innerText = "{{$gases[1]->name}}";
        document.getElementById("valorLimiteGas").innerText = "{{$gases[1]->fix_values}}";
        document.getElementById("valorInfoGas").innerText = "{{$gases[1]->information_values}}";
        document.getElementById("valorAlertaGas").innerText = "{{$gases[1]->alert_values}}";
        document.getElementById("descGas").innerText = "{{$gases[1]->description}}";
        document.getElementById("imagenGas").setAttribute("src", "{{$gases[1]->route_image}}");
        document.getElementById("co2").classList.remove("borderColor");
        document.getElementById("bencenopireno").classList.remove("borderColor");
        document.getElementById("no2").classList.remove("borderColor");
        document.getElementById("so2").classList.remove("borderColor");
        document.getElementById("o3").classList.remove("borderColor");
        document.getElementById("pm25").classList.add("borderColor");
        document.getElementById("pm10").classList.remove("borderColor");
        document.getElementById("plomo").classList.remove("borderColor");
        document.getElementById("benceno").classList.remove("borderColor");
        document.getElementById("arsenico").classList.remove("borderColor");

    }

    function datosPm10() {
        document.getElementById("nombreGas").innerText = "{{$gases[2]->name}}";
        document.getElementById("valorLimiteGas").innerText = "{{$gases[2]->fix_values}}";
        document.getElementById("valorInfoGas").innerText = "{{$gases[2]->information_values}}";
        document.getElementById("valorAlertaGas").innerText = "{{$gases[2]->alert_values}}";
        document.getElementById("descGas").innerText = "{{$gases[6]->description}}";
        document.getElementById("imagenGas").setAttribute("src", "{{$gases[2]->route_image}}");
        document.getElementById("co2").classList.remove("borderColor");
        document.getElementById("bencenopireno").classList.remove("borderColor");
        document.getElementById("no2").classList.remove("borderColor");
        document.getElementById("so2").classList.remove("borderColor");
        document.getElementById("o3").classList.remove("borderColor");
        document.getElementById("pm25").classList.remove("borderColor");
        document.getElementById("pm10").classList.add("borderColor");
        document.getElementById("plomo").classList.remove("borderColor");
        document.getElementById("benceno").classList.remove("borderColor");
        document.getElementById("arsenico").classList.remove("borderColor");

    }

    function datosPlomo() {
        document.getElementById("nombreGas").innerText = "{{$gases[6]->name}}";
        document.getElementById("valorLimiteGas").innerText = "{{$gases[6]->fix_values}}";
        document.getElementById("valorInfoGas").innerText = "{{$gases[6]->information_values}}";
        document.getElementById("valorAlertaGas").innerText = "{{$gases[6]->alert_values}}";
        document.getElementById("descGas").innerText = "{{$gases[6]->description}}";
        document.getElementById("imagenGas").setAttribute("src", "{{$gases[6]->route_image}}");
        document.getElementById("co2").classList.remove("borderColor");
        document.getElementById("bencenopireno").classList.remove("borderColor");
        document.getElementById("no2").classList.remove("borderColor");
        document.getElementById("so2").classList.remove("borderColor");
        document.getElementById("o3").classList.remove("borderColor");
        document.getElementById("pm25").classList.remove("borderColor");
        document.getElementById("pm10").classList.remove("borderColor");
        document.getElementById("plomo").classList.add("borderColor");
        document.getElementById("benceno").classList.remove("borderColor");
        document.getElementById("arsenico").classList.remove("borderColor");

    }

    function datosBenceno() {
        document.getElementById("nombreGas").innerText = "{{$gases[7]->name}}";
        document.getElementById("valorLimiteGas").innerText = "{{$gases[7]->fix_values}}";
        document.getElementById("valorInfoGas").innerText = "{{$gases[7]->information_values}}";
        document.getElementById("valorAlertaGas").innerText = "{{$gases[7]->alert_values}}";
        document.getElementById("descGas").innerText = "{{$gases[7]->description}}";
        document.getElementById("imagenGas").setAttribute("src", "{{$gases[7]->route_image}}");
        document.getElementById("co2").classList.remove("borderColor");
        document.getElementById("bencenopireno").classList.remove("borderColor");
        document.getElementById("no2").classList.remove("borderColor");
        document.getElementById("so2").classList.remove("borderColor");
        document.getElementById("o3").classList.remove("borderColor");
        document.getElementById("pm25").classList.remove("borderColor");
        document.getElementById("pm10").classList.remove("borderColor");
        document.getElementById("plomo").classList.remove("borderColor");
        document.getElementById("benceno").classList.add("borderColor");
        document.getElementById("arsenico").classList.remove("borderColor");

    }

    function datosArsenico() {
        document.getElementById("nombreGas").innerText = "{{$gases[8]->name}}";
        document.getElementById("valorLimiteGas").innerText = "{{$gases[8]->fix_values}}";
        document.getElementById("valorInfoGas").innerText = "{{$gases[8]->information_values}}";
        document.getElementById("valorAlertaGas").innerText = "{{$gases[8]->alert_values}}";
        document.getElementById("descGas").innerText = "{{$gases[8]->description}}";
        document.getElementById("imagenGas").setAttribute("src", "{{$gases[8]->route_image}}");
        document.getElementById("co2").classList.remove("borderColor");
        document.getElementById("bencenopireno").classList.remove("borderColor");
        document.getElementById("no2").classList.remove("borderColor");
        document.getElementById("so2").classList.remove("borderColor");
        document.getElementById("o3").classList.remove("borderColor");
        document.getElementById("pm25").classList.remove("borderColor");
        document.getElementById("pm10").classList.remove("borderColor");
        document.getElementById("plomo").classList.remove("borderColor");
        document.getElementById("benceno").classList.remove("borderColor");
        document.getElementById("arsenico").classList.add("borderColor");

    }
</script>
<script src="{{ asset('src/js/vendor/jquery-3.3.1.min.js') }}"></script>
<script src="{{ asset('plugins/popper.js/dist/umd/popper.min.js') }}"></script>
<script src="{{ asset('plugins/bootstrap/dist/js/bootstrap.min.js') }}"></script>
<script src="{{ asset('plugins/perfect-scrollbar/dist/perfect-scrollbar.min.js') }}"></script>
<script src="{{ asset('plugins/screenfull/dist/screenfull.js') }}"></script>

</body>
</html>
