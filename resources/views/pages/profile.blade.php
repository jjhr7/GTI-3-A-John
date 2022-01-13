@extends('layouts.main')
@section('title', 'Perfil')
@section('content')



    <div class="container-fluid">
        <div class="page-header">
            <div class="row align-items-end">
                <div class="col-lg-8">
                    <div class="page-header-title">
                        <i class="ik ik-file-text bg-blue"></i>
                        <div class="d-inline">
                            <h5>{{ __('Perfil')}}</h5>
                            <span>{{ __('Aquí podras ver toda tu información')}}</span>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4">
                    <nav class="breadcrumb-container" aria-label="breadcrumb">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item">
                                <a href="{{route('dashboard')}}"><i class="ik ik-home"></i></a>
                            </li>
                            <li class="breadcrumb-item active" aria-current="page">{{ __('Perfil')}}</li>
                        </ol>
                    </nav>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-lg-4 col-md-5">
                <div class="card">
                    <div class="card-body">
                        <div class="text-center">
                            <img src="../img/user.jpg" class="rounded-circle" width="150" />
                            <h4 class="card-title mt-10">{{ __(auth()->user()->name)}}</h4>
                            <p class="card-subtitle">{{ __(auth()->user()->information->role->name)}}</p>
                        </div>
                    </div>
                    <hr class="mb-0">
                    <div class="card-body">
                        <small class="text-muted d-block">{{ __('Email')}} </small>
                        <h6>{{__(auth()->user()->email)}}</h6>
                        <small class="text-muted d-block pt-10">{{ __('Telefono')}}</small>
                        <h6>{{__(auth()->user()->accountInformation->phone_number)}}</h6>
                        <small class="text-muted d-block pt-10">{{ __('Ciudad')}}</small>
                        <h6>{{__(auth()->user()->information->town->name)}}</h6>
                        <div class="map-box">
                            <iframe src="https://maps.google.com/maps?width=100%25&amp;height=600&amp;hl=es&amp;q=Carrer%20del%20Paranimf,%201,%2046730%20Gandia,%20Valencia+(UPV,%20Campus%20Gand%C3%ADa)&amp;t=&amp;z=14&amp;ie=UTF8&amp;iwloc=B&amp;output=embed" width="100%" height="300" frameborder="0" scrolling="no" marginheight="0" marginwidth="0" style="border:0" allowfullscreen><a href="https://www.gps.ie/car-satnav-gps/">Car Navigation Systems</a></iframe>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-8 col-md-7">
                <div class="card">
                    <ul class="nav nav-pills custom-pills" id="pills-tab" role="tablist">
                        <li class="nav-item">
                            <a class="nav-link active" id="pills-actividad-usuario-tab" data-toggle="pill" href="#current-month" role="tab" aria-controls="pills-actividad-usuario" aria-selected="true">{{ __('Actividad del usuario')}}</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" id="pills-municipio-tab" data-toggle="pill" href="#last-month" role="tab" aria-controls="pills-municipio" aria-selected="false">{{ __('Municipio')}}</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" id="pills-datos-tab" data-toggle="pill" href="#previous-month" role="tab" aria-controls="pills-datos" aria-selected="false">{{ __('Datos')}}</a>
                        </li>
                    </ul>
                    <div class="tab-content" id="pills-tabContent">
                        <div class="tab-pane fade show active" id="current-month" role="tabpanel" aria-labelledby="pills-actividad-usuario-tab">
                            <div class="card-body">
                                <div class="municipiotimeline mt-0">

                                    @if(count($useractivities) != 0)
                                        @foreach($useractivities  as $activity)

                                            <div class="sl-item">
                                                <div class="sl-right">
                                                    <div><h4>Actividad del día: <span class="sl-date">{{__($activity->date)}}</span></h4>
                                                        <p>Tiempo de actividad: {{__($activity->time_activity)}}h</p>
                                                        <p>Distancia recorrida: {{__($activity->distance_traveled)}}m</p>

                                                        <div class="row">
                                                            <div class="col-lg-3 col-md-6 mb-20"><img src="../img/big/img2.jpg" class="img-fluid rounded" /></div>
                                                            <div class="col-lg-3 col-md-6 mb-20"><img src="../img/big/img3.jpg" class="img-fluid rounded" /></div>
                                                            <div class="col-lg-3 col-md-6 mb-20"><img src="../img/big/img4.jpg" class="img-fluid rounded" /></div>
                                                            <div class="col-lg-3 col-md-6 mb-20"><img src="../img/big/img5.jpg" class="img-fluid rounded" /></div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        @endforeach
                                    @else
                                        Este usuario aún no tiene actividad.
                                    @endif

                                </div>
                            </div>
                        </div>
                        <div class="tab-pane fade" id="last-month" role="tabpanel" aria-labelledby="pills-municipio-tab">
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-md-3 col-6"> <strong>{{ __('Nombre')}}</strong>
                                        <br>
                                        <p class="text-muted">{{ __(auth()->user()->name)}}</p>
                                    </div>
                                    <div class="col-md-3 col-6"> <strong>{{ __('Teléfono móvil')}}</strong>
                                        <br>
                                        <p class="text-muted">{{__(auth()->user()->accountInformation->phone_number)}}</p>
                                    </div>
                                    <div class="col-md-3 col-6"> <strong>{{ __('Email')}}</strong>
                                        <br>
                                        <p class="text-muted">{{ __(auth()->user()->email)}}</p>
                                    </div>
                                    <div class="col-md-3 col-6"> <strong>{{ __('Dirección')}}</strong>
                                        <br>
                                        <p class="text-muted">{{__(auth()->user()->information->town->name)}}</p>
                                    </div>
                                </div>
                                <hr>
                                <h4 class="mt-30">{{ __(auth()->user()->information->town->name)}}</h4>
                                <p class="mt-30">{{ __('La ciudad de Gandia, corazón de la comarca de La Safor en la Comunitat Valenciana. Gandia cuenta con una ubicación privilegiada, entre el mar y las montañas. En su ambiente se respira una rica herencia histórica que impregna sus monumentos y el espíritu de sus gentes. Esté es uno de sus mayores alicientes, para una ciudad cuya oferta turística es capaz, por infraestructuras y variedad, de satisfacer a los visitantes más exigentes.')}}</p>
                                <h4 class="mt-30">{{ __('Estimación media de los gases que conforman la calidad del aire')}}</h4>
                                <hr>
                                <h6 class="mt-30">{{ __('CO2')}} <span class="pull-right">20%</span></h6>
                                <div class="progress progress-sm">
                                    <div class="progress-bar bg-success" role="progressbar" aria-valuenow="20" aria-valuemin="0" aria-valuemax="100" style="width:20%;"> <span class="sr-only">50% Complete</span> </div>
                                </div>
                                <h6 class="mt-30">{{ __('O3')}} <span class="pull-right">50%</span></h6>
                                <div class="progress  progress-sm">
                                    <div class="progress-bar bg-info" role="progressbar" aria-valuenow="10" aria-valuemin="0" aria-valuemax="100" style="width:50%;"> <span class="sr-only">50% Complete</span> </div>
                                </div>
                                <h6 class="mt-30">{{ __('NO3')}} <span class="pull-right">20%</span></h6>
                                <div class="progress  progress-sm">
                                    <div class="progress-bar bg-danger" role="progressbar" aria-valuenow="20" aria-valuemin="0" aria-valuemax="100" style="width:20%;"> <span class="sr-only">50% Complete</span> </div>
                                </div>
                                <h6 class="mt-30">{{ __('SO2')}} <span class="pull-right">10%</span></h6>
                                <div class="progress  progress-sm">
                                    <div class="progress-bar bg-warning" role="progressbar" aria-valuenow="10" aria-valuemin="0" aria-valuemax="100" style="width:10%;"> <span class="sr-only">50% Complete</span> </div>
                                </div>
                            </div>
                        </div>
                        <div class="tab-pane fade" id="previous-month" role="tabpanel" aria-labelledby="pills-datos-tab">
                            <div class="card-body">
                                <form class="form-horizontal">
                                    <div class="form-group">
                                        <label for="example-name">{{ __('Nombre')}}</label>
                                        <input type="text" placeholder="{{auth()->user()->name}}" class="form-control" name="example-name" id="example-name">
                                    </div>
                                    <div class="form-group">
                                        <label for="example-email">{{ __('Email')}}</label>
                                        <input type="email" placeholder="{{auth()->user()->email}}" class="form-control" name="example-email" id="example-email">
                                    </div>
                                    <div class="form-group">
                                        <label for="example-password">{{ __('Password')}}</label>
                                        <input type="password" value="password" class="form-control" name="example-password" id="example-password">
                                    </div>
                                    <div class="form-group">
                                        <label for="example-phone">{{ __('Teléfono')}}</label>
                                        <input type="text" placeholder="{{auth()->user()->accountInformation->phone_number}}" id="example-phone" name="example-phone" class="form-control">
                                    </div>
                                    <div class="form-group">
                                        <label for="example-country">{{ __('Municipio')}}</label>
                                        <select name="example-message" id="example-message" class="form-control">
                                            <option>{{ auth()->user()->information->town->name}}</option>
                                            <option>{{ __('Valencia')}}</option>
                                            <option>{{ __('Manises')}}</option>
                                            <option>{{ __('Teulada')}}</option>
                                        </select>
                                    </div>
                                    <button class="btn btn-success" type="submit">Actualizar perfil</button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
