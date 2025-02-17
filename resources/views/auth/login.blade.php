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
        <link rel="stylesheet" href="{{ asset('plugins/fontawesome-free/css/all.min.css') }}">
        <link rel="stylesheet" href="{{ asset('plugins/ionicons/dist/css/ionicons.min.css') }}">
        <link rel="stylesheet" href="{{ asset('plugins/icon-kit/dist/css/iconkit.min.css') }}">
        <link rel="stylesheet" href="{{ asset('plugins/perfect-scrollbar/css/perfect-scrollbar.css') }}">
        <link rel="stylesheet" href="{{ asset('dist/css/theme.min.css') }}">
        <link rel="stylesheet" href="{{ asset('css/style.css') }}">
        <link rel="stylesheet" href="{{ asset('css/login.css') }}">
        <script src="{{ asset('src/js/vendor/modernizr-2.8.3.min.js') }}"></script>
    </head>

    <body>
        <!--[if lt IE 8]>
            <p class="browserupgrade">You are using an <strong>outdated</strong> browser. Please <a href="http://browsehappy.com/">upgrade your browser</a> to improve your experience.</p>
        <![endif]-->

        <div class="auth-wrapper">
            <div class="container-fluid h-100">
                <div class="row flex-row h-100 bg-white">
                    <div class="col-xl-5 col-lg-6 col-md-5 p-0 d-md-block d-lg-block d-sm-none d-none">
                        <div class="lavalite-bg" class="fondoLogin">
                            <div class="lavalite-overlay">
                                <a href="{{url('register')}}" ><img class="logo" src="{{asset('img/logoPequeno.png')}}"> </a>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-7 col-lg-6 col-md-7 p-0 centrarElementos">
                        <div class="authentication-form mx-auto">
                                <h2 class="tituloLogin">{{ __('Bienvenido de nuevo')}}</h2>
                            <h2 class="textoLogin">{{ __('Ingrese a su cuenta')}}</h2>
                            <form class="row align-items-start" method="POST" action="{{ route('login') }}">
                            @csrf
                                <div class="form-group">
                                    <label class="col-lg-2 control-label textForm">Email</label>
                                    <div class="col-lg-10">
                                    <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>
                                    @error('email')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label class="col-lg-2 control-label textForm">Contraseña</label>
                                    <div class="col-lg-10">
                                    <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required>
                                    @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                                </div>
                                <div>
                                    <div class="d-flex">
                                        <p class="btn text textoLogin3 centrarElementos">{{ __('¿Aún no tienes cuenta?')}}
                                            <a class="p-lg-5 textoHover" href="{{url('register')}}"> <u>{{ __('Regístrate')}}</u> </a>
                                        </p>
                                    </div>
                                    <div class="d-flex justify-content-between margenTextos centrarElementos">
                                        <a class="btn text textoLogin3 centrarElementos separacionTextos" href="{{url('password/forget')}}">
                                            {{ __('¿Has olvidado tu contraseña?') }} </a>
                                            <button class="btn-custom align-bottom">Iniciar sesión</button>
                                    </div>
                                </div>
                                </div>
                                </div>
                            </form>
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
