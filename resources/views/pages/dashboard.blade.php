@extends('layouts.main')
@section('title', 'Dashboard')
@section('content')
    <!-- push external head elements to head -->
    @push('head')

        <link rel="stylesheet" href="{{ asset('plugins/weather-icons/css/weather-icons.min.css') }}">
        <link rel="stylesheet" href="{{ asset('plugins/owl.carousel/dist/assets/owl.carousel.min.css') }}">
        <link rel="stylesheet" href="{{ asset('plugins/owl.carousel/dist/assets/owl.theme.default.min.css') }}">
        <link rel="stylesheet" href="{{ asset('plugins/chartist/dist/chartist.min.css') }}">
    @endpush

    <div class="container-fluid">
    	<div class="row">

    		<!-- page statustic chart start --
            <div class="col-xl-3 col-md-6">
                <div class="card card-red text-white">
                    <div class="card-block">
                        <div class="row align-items-center">
                            <div class="col-8">
                                <h4 class="mb-0">{{ __('2,563')}}</h4>
                                <p class="mb-0">{{ __('Products')}}</p>
                            </div>
                            <div class="col-4 text-right">
                                <i class="fas fa-cube f-30"></i>
                            </div>
                        </div>
                        <div id="Widget-line-chart1" class="chart-line chart-shadow"></div>
                    </div>
                </div>
            </div>
            <div class="col-xl-3 col-md-6">
                <div class="card card-blue text-white">
                    <div class="card-block">
                        <div class="row align-items-center">
                            <div class="col-8">
                                <h4 class="mb-0">{{ __('3,612')}}</h4>
                                <p class="mb-0">{{ __('Orders')}}</p>
                            </div>
                            <div class="col-4 text-right">
                                <i class="ik ik-shopping-cart f-30"></i>
                            </div>
                        </div>
                        <div id="Widget-line-chart2" class="chart-line chart-shadow" ></div>
                    </div>
                </div>
            </div>
            <div class="col-xl-3 col-md-6">
                <div class="card card-green text-white">
                    <div class="card-block">
                        <div class="row align-items-center">
                            <div class="col-8">
                                <h4 class="mb-0">{{ __('865')}}</h4>
                                <p class="mb-0">{{ __('Customers')}}</p>
                            </div>
                            <div class="col-4 text-right">
                                <i class="ik ik-user f-30"></i>
                            </div>
                        </div>
                        <div id="Widget-line-chart3" class="chart-line chart-shadow"></div>
                    </div>
                </div>
            </div>
            <div class="col-xl-3 col-md-6">
                <div class="card card-yellow text-white">
                    <div class="card-block">
                        <div class="row align-items-center">
                            <div class="col-8">
                                <h4 class="mb-0">{{ __('35,500')}}</h4>
                                <p class="mb-0">{{ __('Sales')}}</p>
                            </div>
                            <div class="col-4 text-right">
                                <i class="ik f-30">৳</i>
                            </div>
                        </div>
                        <div id="Widget-line-chart4" class="chart-line chart-shadow" ></div>
                    </div>
                </div>
            </div>
            -- page statustic chart end -->

            <!-- sale 2 card start -->
            <div class="col-xl-8 col-md-6">
                <div class="card sale-card">
                    <div class="card-header">
                        <h3>{{ __('Tu puesto en el rankig es #10')}}</h3>
                    </div>
                    <div class="card-block text-center">
                        <h4>{{ __('Mediciones')}}</h4>
                        <div id="realtime-profit"></div>
                    </div>
                </div>
            </div>
            <div class="col-xl-4 col-md-6">
                <div class="card table-card">
                    <div class="card-header">
                        <h3>{{ __('Progreso')}}</h3>
                        <div class="card-header-right">
                            <ul class="list-unstyled card-option">
                                <li><i class="ik ik-chevron-left action-toggle"></i></li>
                                <li><i class="ik ik-minus minimize-card"></i></li>
                                <li><i class="ik ik-x close-card"></i></li>
                            </ul>
                        </div>
                    </div>
                    <div class="card-block p-b-0">
                        <div class="table-responsive scroll-widget">
                            <table class="table table-hover table-borderless mb-0">
                                <thead>
                                <tr>
                                    <th>{{ __('Gas')}}</th>
                                    <th>{{ __('Cambios')}}</th>
                                    <th>{{ __('Media')}}</th>
                                </tr>
                                </thead>
                                <tbody>
                                <tr>
                                    <td>
                                        <div class="d-inline-block align-middle">
                                            <h6>{{ __('CO2')}}</h6>
                                            <p class="text-muted mb-0">{{ __('Dióxido de carbono')}}</p>
                                        </div>
                                    </td>
                                    <td>
                                        <div id="app-sale1"></div>
                                    </td>
                                    <td>{{ __('15,652%')}}</td>
                                </tr>
                                <tr>
                                    <td>
                                        <div class="d-inline-block align-middle">
                                            <h6>{{ __('O3')}}</h6>
                                            <p class="text-muted mb-0">{{ __('Ozono')}}</p>
                                        </div>
                                    </td>
                                    <td>
                                        <div id="app-sale2"></div>
                                    </td>
                                    <td>{{ __('35%')}}</td>
                                </tr>
                                <tr>
                                    <td>
                                        <div class="d-inline-block align-middle">
                                            <h6>{{ __('NO2')}}</h6>
                                            <p class="text-muted mb-0">{{ __('Dióxido de nitrógeno')}}</p>
                                        </div>
                                    </td>
                                    <td>
                                        <div id="app-sale3"></div>
                                    </td>
                                    <td>{{ __('9,8%')}}</td>
                                </tr>
                                <tr>
                                    <td>
                                        <div class="d-inline-block align-middle">
                                            <h6>{{ __('SO2')}}</h6>
                                            <p class="text-muted mb-0">{{ __('Dióxido de azufre ')}}</p>
                                        </div>
                                    </td>
                                    <td>
                                        <div id="app-sale4"></div>
                                    </td>
                                    <td>{{ __('20%')}}</td>
                                </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                    <div class="card-footer">
                        <div class="text-right">
                            <a href="#!" class=" b-b-primary text-primary">{{ __('Ver el resto de gases')}}</a>
                        </div>
                    </div>
                </div>
            </div>
                <div class="col-xl-8 col-md-6">
                    <div class="row">
                        <div class="col-xl-6 col-md-6">
                            <div class="card new-cust-card">
                                <div class="card-header">
                                    <h3>{{ __('Municipios por encima del tuyo')}}</h3>
                                    <div class="card-header-right">
                                        <ul class="list-unstyled card-option">
                                            <li><i class="ik ik-chevron-left action-toggle"></i></li>
                                            <li><i class="ik ik-minus minimize-card"></i></li>
                                            <li><i class="ik ik-x close-card"></i></li>
                                        </ul>
                                    </div>
                                </div>
                                <div class="card-block">
                                    <div class="align-middle mb-25">
                                        <img src="../img/users/3.jpg" alt="user image" class="rounded-circle img-40 align-top mr-15">
                                        <div class="d-inline-block">
                                            <a href="#!"><h6>{{ __('Gandia')}}</h6></a>
                                            <span class="status deactive text-mute"><i class="far fa-trophy mr-10"></i>{{ __('#8')}}</span>
                                        </div>
                                    </div>
                                    <div class="align-middle mb-25">
                                        <img src="../img/users/4.jpg" alt="user image" class="rounded-circle img-40 align-top mr-15">
                                        <div class="d-inline-block">
                                            <a href="#!"><h6>{{ __('Teulada')}}</h6></a>
                                            <span class="status deactive text-mute"><i class="far fa-trophy mr-10"></i>{{ __('#9')}}</span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-xl-6 col-md-6">
                            <div class="card new-cust-card">
                                <div class="card-header">
                                    <h3>{{ __('Municipios por debajo del tuyo')}}</h3>
                                    <div class="card-header-right">
                                        <ul class="list-unstyled card-option">
                                            <li><i class="ik ik-chevron-left action-toggle"></i></li>
                                            <li><i class="ik ik-minus minimize-card"></i></li>
                                            <li><i class="ik ik-x close-card"></i></li>
                                        </ul>
                                    </div>
                                </div>
                                <div class="card-block">
                                    <div class="align-middle mb-25">
                                        <img src="../img/users/1.jpg" alt="user image" class="rounded-circle img-40 align-top mr-15">
                                        <div class="d-inline-block">
                                            <a href="#!"><h6>{{ __('Manises')}}</h6></a>
                                            <span class="status deactive text-mute"><i class="far fa-trophy mr-10"></i>{{ __('#11')}}</span>
                                        </div>
                                    </div>
                                    <div class="align-middle mb-25">
                                        <img src="../img/users/2.jpg" alt="user image" class="rounded-circle img-40 align-top mr-15">
                                        <div class="d-inline-block">
                                            <a href="#!"><h6>{{ __('Valencia')}}</h6></a>
                                            <span class="status deactive text-mute"><i class="far fa-trophy mr-10"></i>{{ __('#12')}}</span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-xl-4 col-md-6">
                    <div class="card sale-card">
                        <div class="card-header">
                            <h3>{{ __('Pasos dados')}}</h3>
                        </div>
                        <div class="card-block text-center">
                            <div id="sale-diff" class="chart-shadow"></div>
                        </div>
                    </div>
                </div>

    	</div>
    </div>
	<!-- push external js -->
    @push('script')
        <script src="{{ asset('plugins/owl.carousel/dist/owl.carousel.min.js') }}"></script>
        <script src="{{ asset('plugins/chartist/dist/chartist.min.js') }}"></script>
        <script src="{{ asset('plugins/flot-charts/jquery.flot.js') }}"></script>
        <!-- <script src="{{ asset('plugins/flot-charts/jquery.flot.categories.js') }}"></script> -->
        <script src="{{ asset('plugins/flot-charts/curvedLines.js') }}"></script>
        <script src="{{ asset('plugins/flot-charts/jquery.flot.tooltip.min.js') }}"></script>

        <script src="{{ asset('plugins/amcharts/amcharts.js') }}"></script>
        <script src="{{ asset('plugins/amcharts/serial.js') }}"></script>
        <script src="{{ asset('plugins/amcharts/themes/light.js') }}"></script>


        <script src="{{ asset('js/widget-statistic.js') }}"></script>
        <script src="{{ asset('js/widget-data.js') }}"></script>
        <script src="{{ asset('js/dashboard-charts.js') }}"></script>

    @endpush
@endsection
