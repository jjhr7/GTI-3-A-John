@extends('layouts.main')
@section('title', 'REST API')
@section('content')

    <div class="container-fluid">
        <div class="page-header">
            <div class="row align-items-end">
                <div class="col-lg-8">
                    <div class="page-header-title">
                        <i class="ik ik-layers bg-blue"></i>
                        <div class="d-inline">
                            <h5>{{ __('REST API')}}</h5>
                            <span>{{ __('REST API with Laravel Passport')}} </span>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4">
                    <nav class="breadcrumb-container" aria-label="breadcrumb">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item">
                                <a href="{{route('dashboard')}}"><i class="ik ik-home"></i></a>
                            </li>
                            <li class="breadcrumb-item">
                                <a href="#">{{ __('REST API')}}</a>
                            </li>
                        </ol>
                    </nav>
                </div>
            </div>
        </div>
        <div class="row">
            <!-- Instruction start -->
            <div class="col-md-12">
                <div class="card table-card proj-t-card">
                    <div class="card-body">
                            <div class="row">
                                <div class="col-md-10 p-3">
                                    {{ __('The Radmin API is a low-level HTTP-based API for a Laravel admin starter kit that you can use to')}}  <code>create/edit/update</code><br> {{ __('Radmin API uses')}}<code>Laravel Passport</code>

                                    <br>
                                    Full documentation and API endpoints: https://documenter.getpostman.com/view/11223504/Szmh1vqc?version=latest
                                    <br><br>
                                    {{ __('Example:')}}  <br>
                                    <img src="{{ asset('img/api.JPG')}}" alt="" class="img-fluid"> <br><br>
                                    {{ __('Laravel Passport')}}   <a class="text-red" href="https://laravel.com/docs/7.x/passport"> {{ __('documentation')}}  </a>.
                                </div>
                            </div>
                        <h6 class="pt-badge bg-red">{{ __('Passport')}} </h6>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12">
                <div class="card p-3">
                    <div class="card-header"><h3>{{ __('Basic Usage')}}</h3></div>
                    <div class="card-body">
                        <p>After successful login, an <code>access_token</code> will be provided to user. This token will be used for further requests</p> <code>access_token</code> will be like, <code>eyJ0eXAiOiJKV1QiLCJhbGciOiJIUzI1NiJ9.eyJpc3MiOiJodHRwczpcL1wvd29ya3N1aXRlLmRldlwvYXBpXC92MVwvYXV0aFwvbG9naW4iLCJpYXQiOjE1ODAyODA3MjksImV4cCI6MTYxMTkwMzEyOCwibmJmIjoxNTgwMjgwNzI5LCJqdGkiOiJBYXE1QkdnT0p1dG1ycUdIIiwic3ViIjoxLCJwcnYiOiI4MThmNWM5OGFjZTIzNzUzMmQ5ZDQ5NDNmZDhlZmI1NDBiODU1YjQyIiwicmVtZW1iZXIiOjEsInR5cGUiOjF9.wK4OhcwUWa9uwFboqkZCOznjnRnjU19yzoCGCKIZUY0</code>

                        <br>
                        User must set request header with this data
<pre>
<code>
'headers' => [
    'Accept' => 'application/json',
    'Authorization' => 'Bearer eyJ0eXAiOiJKV1QiLCJhbGciOiJIUzI1NiJ9.eyJpc3MiOiJodHRwczpcL1wvd29ya3N1aXRlLmRldlwvYXBpXC92MVwvYXV0aFwvbG9naW4iLCJpYXQiOjE1ODAyODA3MjksImV4cCI6MTYxMTkwMzEyOCwibmJmIjoxNTgwMjgwNzI5LCJqdGkiOiJBYXE1QkdnT0p1dG1ycUdIIiwic3ViIjoxLCJwcnYiOiI4MThmNWM5OGFjZTIzNzUzMmQ5ZDQ5NDNmZDhlZmI1NDBiODU1YjQyIiwicmVtZW1iZXIiOjEsInR5cGUiOjF9.wK4OhcwUWa9uwFboqkZCOznjnRnjU19yzoCGCKIZUY0',
],
</code>
</pre>
                        <span class="text-muted">Part after "Bearer" is the access token</span>
                    </div>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-md-12">
                <div class="card p-3">
                    <div class="card-header"><h3>{{ __('Available Api Endpoints')}}</h3></div>
                    <div class="card-body">
                        <table id="permission_table" class="table">
                            <thead>
                                <tr>
                                    <th>{{ __('Method')}}</th>
                                    <th>{{ __('URl')}}</th>
                                    <th>{{ __('Parameters')}}</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td><strong class="text-blue">POST</strong></td>
                                    <td>/api/v1/login</td>
                                    <td><code>{email, password}</code></td>
                                </tr>
                                <tr>
                                    <td><strong class="text-blue">POST</strong></td>
                                    <td>/api/v1/logout</td>
                                    <td><code>{email, password}</code></td>
                                </tr>
                                <tr>
                                    <td><strong class="text-green">GET</strong></td>
                                    <td>/api/v1/municipios</td>
                                    <td></td>
                                </tr>
                                <tr>
                                    <td><strong class="text-blue">POST</strong></td>
                                    <td>/api/v1/municipios/create</td>
                                    <td><code>{postal_code, name, area, altitude}</code></td>
                                </tr>
                                <tr>
                                    <td><strong class="text-green">GET</strong></td>
                                    <td>/api/v1/municipio/{id}</td>
                                    <td></td>
                                </tr>
                                <tr>
                                    <td><strong class="text-blue">POST</strong></td>
                                    <td>/api/v1/municipio/update/{id}</td>
                                    <td><code>{postal_code, name, area, altitude}</code></td>
                                </tr>
                                <tr>
                                    <td><strong class="text-warning">DELETE</strong></td>
                                    <td>/api/v1/municipio/delete/{id}</td>
                                    <td></td>
                                </tr>
                                <tr>
                                    <td><strong class="text-green">GET</strong></td>
                                    <td>/api/v1/municipio/users/{id}</td>
                                    <td></td>
                                </tr>
                                <tr>
                                    <td><strong class="text-green">GET</strong></td>
                                    <td>/api/v1/user/{id}</td>
                                    <td></td>
                                </tr>
                                <tr>
                                    <td><strong class="text-warning">DELETE</strong></td>
                                    <td>/api/v1/user/delete/{id}</td>
                                    <td></td>
                                </tr>
                                <tr>
                                    <td><strong class="text-blue">POST</strong></td>
                                    <td>/api/v1/user/device</td>
                                    <td><code>{serial}</code></td>
                                </tr>
                                <tr>
                                    <td><strong class="text-blue">POST</strong></td>
                                    <td>/api/v1/user/update/{id}</td>
                                    <td><code>{id}</code></td>
                                </tr>
                                <tr>
                                    <td><strong class="text-green">GET</strong></td>
                                    <td>/api/v1/notificaciones</td>
                                    <td></td>
                                </tr>
                                <tr>
                                    <td><strong class="text-green">GET</strong></td>
                                    <td>/api/v1/notificaciones/user</td>
                                    <td></td>
                                </tr>
                                <tr>
                                    <td><strong class="text-blue">POST</strong></td>
                                    <td>/api/v1/notificaciones/create</td>
                                    <td><code>{user_id, date, message, type}</code></td>
                                </tr>
                                <tr>
                                    <td><strong class="text-green">GET</strong></td>
                                    <td>/api/v1/notificaciones/{id}</td>
                                    <td></td>
                                </tr>
                                <tr>
                                    <td><strong class="text-blue">POST</strong></td>
                                    <td>/api/v1/notificaciones/update/{id}</td>
                                    <td><code>{user_id, date, message, type}</code></td>
                                </tr>
                                <tr>
                                    <td><strong class="text-warning">DELETE</strong></td>
                                    <td>/api/v1/notificaciones/delete/{id}</td>
                                    <td></td>
                                </tr>
                                <tr>
                                    <td><strong class="text-warning">DELETE</strong></td>
                                    <td>/api/v1/notificaciones/user</td>
                                    <td></td>
                                </tr>
                                <tr>
                                    <td><strong class="text-green">GET</strong></td>
                                    <td>/api/v1/dispositivos</td>
                                    <td></td>
                                </tr>
                                <tr>
                                    <td><strong class="text-green">GET</strong></td>
                                    <td>/api/v1/dispositivos/{id}</td>
                                    <td></td>
                                </tr>
                                <tr>
                                    <td><strong class="text-blue">POST</strong></td>
                                    <td>/api/v1/dispositivos/create</td>
                                    <td><code>{serial}</code></td>
                                </tr>
                                <tr>
                                    <td><strong class="text-blue">POST</strong></td>
                                    <td>/api/v1/dispositivos/update/{id}</td>
                                    <td><code>{serial}</code></td>
                                </tr>
                                <tr>
                                    <td><strong class="text-warning">DELETE</strong></td>
                                    <td>/api/v1/dispositivos/delete/{id}</td>
                                    <td></td>
                                </tr>
                                <tr>
                                    <td><strong class="text-green">GET</strong></td>
                                    <td>/api/v1/mediciones</td>
                                    <td></td>
                                </tr>
                                <tr>
                                    <td><strong class="text-blue">POST</strong></td>
                                    <td>/api/v1/medicion/create</td>
                                    <td><code>{user_id, device_id, latitude, longitude, type_read, value}</code></td>
                                </tr>
                                <tr>
                                    <td><strong class="text-green">GET</strong></td>
                                    <td>/api/v1/medicion/{id}</td>
                                    <td></td>
                                </tr>
                                <tr>
                                    <td><strong class="text-warning">DELETE</strong></td>
                                    <td>/api/v1/medicion/delete/{id}</td>
                                    <td></td>
                                </tr>
                                <tr>
                                    <td><strong class="text-blue">POST</strong></td>
                                    <td>/api/v1/medicion/update/{id}</td>
                                    <td><code>{user_id, device_id, latitude, longitude, type_read, value}</code></td>
                                </tr>
                                <tr>
                                    <td><strong class="text-green">GET</strong></td>
                                    <td>/api/v1/medicioes/user</td>
                                    <td></td>
                                </tr>
                                <tr>
                                    <td><strong class="text-green">GET</strong></td>
                                    <td>/api/v1/mediciones/town</td>
                                    <td></td>
                                </tr>
                                <tr>
                                    <td><strong class="text-blue">POST</strong></td>
                                    <td>/api/v1/medicion/date</td>
                                    <td><code>{date}</code></td>
                                </tr>
                                <tr>
                                    <td><strong class="text-green">GET</strong></td>
                                    <td>/api/v1/healthytowns</td>
                                    <td></td>
                                </tr>
                                <tr>
                                    <td><strong class="text-blue">POST</strong></td>
                                    <td>/api/v1/healthytown/create</td>
                                    <td><code>{town_id, date}</code></td>
                                </tr>
                                <tr>
                                    <td><strong class="text-green">GET</strong></td>
                                    <td>/api/v1/healthytown/{id}</td>
                                    <td></td>
                                </tr>
                                <tr>
                                    <td><strong class="text-warning">DELETE</strong></td>
                                    <td>/api/v1/healthytown/delete/{id}</td>
                                    <td></td>
                                </tr>
                                <tr>
                                    <td><strong class="text-green">GET</strong></td>
                                    <td>/api/v1/gases</td>
                                    <td></td>
                                </tr>
                                <tr>
                                    <td><strong class="text-green">GET</strong></td>
                                    <td>/api/v1/gas/{id}</td>
                                    <td></td>
                                </tr>
                                <tr>
                                    <td><strong class="text-green">GET</strong></td>
                                    <td>/api/v1/users</td>
                                    <td></td>
                                </tr>
                                <tr>
                                    <td><strong class="text-blue">POST</strong></td>
                                    <td>/api/v1/user/create</td>
                                    <td><code>{name,email, password}</code></td>
                                </tr>
                                <tr>
                                    <td><strong class="text-green">GET</strong></td>
                                    <td>/api/v1/user/latest/{nUsuarios}</td>
                                    <td></td>
                                </tr>
                                <tr>
                                    <td><strong class="text-green">GET</strong></td>
                                    <td>/api/v1/roles</td>
                                    <td></td>
                                </tr>
                                <tr>
                                    <td><strong class="text-blue">POST</strong></td>
                                    <td>/api/v1/role/create</td>
                                    <td><code>{name, guard_name}</code></td>
                                </tr>
                                <tr>
                                    <td><strong class="text-green">GET</strong></td>
                                    <td>/api/v1/role/{id}</td>
                                    <td></td>
                                </tr>
                                <tr>
                                    <td><strong class="text-warning">DELETE</strong></td>
                                    <td>/api/v1/role/delete/{id}</td>
                                    <td></td>
                                </tr>
                                <tr>
                                    <td><strong class="text-blue">POST</strong></td>
                                    <td>/api/v1/role/update/{id}</td>
                                    <td><code>{name, guard_name}</code></td>
                                </tr>
                                <tr>
                                    <td><strong class="text-green">GET</strong></td>
                                    <td>/api/v1/permisos</td>
                                    <td></td>
                                </tr>
                                <tr>
                                    <td><strong class="text-blue">POST</strong></td>
                                    <td>/api/v1/permisos/create</td>
                                    <td><code>{name, guard_name}</code></td>
                                </tr>
                                <tr>
                                    <td><strong class="text-green">GET</strong></td>
                                    <td>/api/v1/permisos/{id}</td>
                                    <td></td>
                                </tr>
                                <tr>
                                    <td><strong class="text-warning">DELETE</strong></td>
                                    <td>/api/v1/permisos/delete/{id}</td>
                                    <td></td>
                                </tr>
                                <tr>
                                    <td><strong class="text-blue">POST</strong></td>
                                    <td>/api/v1/registroapp</td>
                                    <td><code>{name, email, password, town_id, role_id}</code></td>
                                </tr>
                                <tr>
                                    <td><strong class="text-green">GET</strong></td>
                                    <td>/api/v1/municipios</td>
                                    <td></td>
                                </tr>
                                <tr>
                                    <td><strong class="text-green">GET</strong></td>
                                    <td>/api/v1/mediciones</td>
                                    <td></td>
                                </tr>

                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
