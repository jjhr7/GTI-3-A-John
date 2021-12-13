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
                        <div class="col boxIcono"><a href="#"><img class="box-gas1" id="co2" src="{{asset('img/gas-guide-img/co2.png')}}"></a></div>
                        <div class="col boxIcono"><a href="#"><img class="box-gas2" id="bencenopireno" src="{{asset('img/gas-guide-img/h2s.png')}}"></a></div>
                        <div class="col boxIcono"><a href="#"><img class="box-gas3" id="no2" src="{{asset('img/gas-guide-img/no2.png')}}"></a></div>
                        <div class="col boxIcono"><a href="#"><img class="box-gas4" id="so2" src="{{asset('img/gas-guide-img/so2.png')}}"></a></div>
                        <div class="col boxIcono"><a href="#"><img class="box-gas5" id="o3" src="{{asset('img/gas-guide-img/o3.png')}}"></a></div>
                        <div class="col boxIcono"><a href="#"><img class="box-gas1" id="pm25" src="{{asset('img/gas-guide-img/pm25.png')}}"></a></div>
                        <div class="col boxIcono"><a href="#"><img class="box-gas2" id="pm10" src="{{asset('img/gas-guide-img/pm10.png')}}"></a></div>
                        <div class="col boxIcono"><a href="#"><img class="box-gas3" id="plomo" src="{{asset('img/gas-guide-img/pb.png')}}"></a></div>
                        <div class="col boxIcono"><a href="#"><img class="box-gas4" id="benceno" src="{{asset('img/gas-guide-img/benceno.png')}}"></a></div>
                        <div class="col boxIcono"><a href="#"><img class="box-gas5" id="arsenico" src="{{asset('img/gas-guide-img/arsenico.png')}}"></a></div>
                    </div>
                    <div class="row mb-12">
                        <div class="col-5 boxIcono"><a href="#"><img class="imgGas" src="{{asset('img/gas-guide-img/humo.png')}}"></a></div>
                        <div class="col-7">
                            <div class="row md-12">
                                    <div class="col-md boxInfo">
                                        <h5 class="tituloBox">Nombre</h5>
                                        <h6 class="datosBox">Dióxido de carbono</h6>
                                    </div>
                                    <div class="col-md boxInfo">
                                        <h5 class="tituloBox">Valor límite</h5>
                                        <h6 class="datosBox">10 mg/m3 por 1h</h6>
                                    </div>
                            </div>
                            <div class="row md-12">
                                <div class="col-md boxInfo">
                                    <h5 class="tituloBox">Valor de información</h5>
                                    <h6 class="datosBox">Entre 500 y 800 ppm: calidad de aire interior mode...</h6>
                                </div>
                                <div class="col-md boxInfo">
                                    <h5 class="tituloBox">Valor de alerta</h5>
                                    <h6 class="datosBox">Nivel superior a 1200 ppm: calidad de aire interior...</h6>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row md-12">
                        <div class="col-md boxInfo">
                            <h5 class="tituloBox">Descripción</h5>
                            <h6 class="datosBox">Es un gas incoloro e inodoro cuyo origen puede est...</h6>
                        </div>

                </div>
            </div>
        </div>
    </div>
</div>

<script src="{{ asset('src/js/vendor/jquery-3.3.1.min.js') }}"></script>
<script src="{{ asset('plugins/popper.js/dist/umd/popper.min.js') }}"></script>
<script src="{{ asset('plugins/bootstrap/dist/js/bootstrap.min.js') }}"></script>
<script src="{{ asset('plugins/perfect-scrollbar/dist/perfect-scrollbar.min.js') }}"></script>
<script src="{{ asset('plugins/screenfull/dist/screenfull.js') }}"></script>

</body>
</html>
