<!doctype html>
<html class="no-js" lang="en">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="x-ua-compatible" content="ie=edge">
        <title>{{ __('Sign Up | Radmin - Laravel Admin Starter')}}</title>
        <meta name="description" content="">
        <meta name="keywords" content="">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <link rel="icon" href="{{ asset('favicon.png') }}"/>

        <link href="https://fonts.googleapis.com/css?family=Nunito+Sans:300,400,600,700,800" rel="stylesheet">

        <link rel="stylesheet" href="{{ asset('plugins/bootstrap/dist/css/bootstrap.min.css') }}">
        <link rel="stylesheet" href="{{ asset('plugins/fontawesome-free/css/all.min.css') }}">
        <link rel="stylesheet" href="{{ asset('plugins/ionicons/dist/css/ionicons.min.css') }}">
        <link rel="stylesheet" href="{{ asset('plugins/icon-kit/dist/css/iconkit.min.css') }}">
        <link rel="stylesheet" href="{{ asset('plugins/perfect-scrollbar/css/perfect-scrollbar.css') }}">
        <link rel="stylesheet" href="{{ asset('dist/css/theme.min.css') }}">
        <link rel="stylesheet" href="{{ asset('css/style.css') }}">
        <link rel="stylesheet" href="{{ asset('dist/css/theme-image.css') }}">
        <link rel="stylesheet" href="{{ asset('css/register.css') }}">
        <script src="{{ asset('src/js/vendor/modernizr-2.8.3.min.js') }}"></script>
    </head>

    <div class="auth-wrapper">
        <div class="container-fluid h-100">
            <div class="row flex-row h-100 bg-white">
                <div class="col-xl-5 col-lg-6 col-md-5 p-0 d-md-block d-lg-block d-sm-none d-none">
                    <div class="lavalite-bg" class="fondoLogin">
                        <div class="lavalite-overlay">
                            <a href="{{url('login')}}" ><img class="logo" src="{{asset('img/logoPequeno.png')}}"> </a>
                        </div>
                    </div>
                </div>
                <div class="col-xl-7 col-lg-6 col-md-7 p-0 centrarElementos">
                    <div class="mx-auto">
                        <h2 class="tituloRegister">{{ __('Bienvenido')}}</h2>
                        <h2 class="textoRegister">{{ __('Por favor, introduzca sus datos')}}</h2>
                            <form action="{{url('register')}}" method="post">
                                @csrf
                                <div class="form-group">
                                    <label class="col-lg-2 control-label textForm">Nombre</label>
                                    <div class="col-lg-10">
                                    <input type="name" class="form-control" name="name" value="{{ old('name') }}" required>
                                </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-lg-2 control-label textForm">Email</label>
                                    <div class="col-lg-10">
                                    <input type="email" class="form-control" name="email" value="{{ old('email') }}" required>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-lg-2 control-label textForm">Contraseña</label>
                                    <div class="col-lg-10">
                                    <input type="password" class="form-control" name="password" required>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-lg-12 control-label textForm">Confirmar contraseña</label>
                                    <div class="col-lg-10">
                                    <input type="password" class="form-control"  name="password_confirmation" required>
                                </div>
                                    <div class="form-group">
                                        <label class="col-lg-2 control-label textForm">Municipio</label>
                                        <div class="col-lg-10 d-flex">
                                            <div class="dropdown">
                                                <button class="btn dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                Teulada
                                                </button>
                                                <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                                                    <a class="dropdown-item" href="#">Teulalda</a>
                                                    <a class="dropdown-item" href="#">Gandía</a>
                                                    <a class="dropdown-item" href="#">Manises</a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                <div class="d-flex">
                                        <p class="btn text textoRegister2 centrarElementos centrar2">{{ __('¿Ya estás registrado?')}}
                                            <u> <a class="p-lg-5 textoRegister2" href="{{url('login')}}">{{ __('Iniciar sesión')}}</a></u></p>
                                    <div class="sign-btn text-center">
                                        <button class="btn-custom align-bottom">Registrarse</button>
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
