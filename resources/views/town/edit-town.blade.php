@extends('layouts.main')
@section('title', 'Towns')
@section('content')
    <!-- push external head elements to head -->
    @push('head')
        <link rel="stylesheet" href="{{ asset('plugins/DataTables/datatables.min.css') }}">
    @endpush


    <div class="container-fluid">
        <div class="page-header">
            <div class="row align-items-end">
                <div class="col-lg-8">
                    <div class="page-header-title">
                        <i class="ik ik-award bg-blue"></i>
                        <div class="d-inline">
                            <h5>{{ __('Towns')}}</h5>
                            <span>{{ __('Edit Town')}}</span>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4">
                    <nav class="breadcrumb-container" aria-label="breadcrumb">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item">
                                <a href="../index.html"><i class="ik ik-home"></i></a>
                            </li>
                            <li class="breadcrumb-item">
                                <a href="#">{{ __('Towns')}}</a>
                            </li>
                        </ol>
                    </nav>
                </div>
            </div>
        </div>
        <div class="row clearfix">
            <!-- start message area-->
        @include('include.message')
        <!-- end message area-->
            <!-- only those have manage_role permission will get access -->
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header"><h3>{{ __('Add Town')}}</h3></div>
                    <div class="card-body">
                        <form class="forms-sample" method="POST" action="{{url('town/update')}}">
                            @csrf
                            <div class="row">
                                <input type="hidden" name="id" value="{{$town->id}}">

                                <div class="col-sm-5">
                                    <div class="form-group">
                                        <label for="name">{{ __('Name')}}<span class="text-red">*</span></label>
                                        <input type="text" class="form-control is-valid" id="name" name="name"  value="{{$town_name}}" placeholder="Town Name" required>
                                    </div>
                                </div>
                                <div class="col-sm-5">
                                    <div class="form-group">
                                        <label for="area">{{ __('Area')}}<span class="text-red">*</span></label>
                                        <input type="number" class="form-control is-valid" id="area" name="area" value="{{$town_area}}" placeholder="Town Area" required>
                                    </div>
                                </div>
                                <div class="col-sm-5">
                                    <div class="form-group">
                                        <label for="altitude">{{ __('Altitude')}}<span class="text-red">*</span></label>
                                        <input type="number" class="form-control is-valid" id="altitude" name="altitude" value="{{$town_altitude}}" placeholder="Town Altitude" required>
                                    </div>
                                </div>
                                <div class="col-sm-5">
                                    <div class="form-group">
                                        <label for="postal_code">{{ __('Postal Code')}}<span class="text-red">*</span></label>
                                        <input type="number" class="form-control is-valid" id="postal_code" name="postal_code" value="{{$town_postal_code}}" placeholder="Postal code" required>
                                    </div>
                                </div>


                            </div>
                            <div class="col-md-12">
                                <div class="form-group">
                                    <button type="submit" class="btn btn-primary">{{ __('Save')}}</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- push external js -->
    @push('script')

    @endpush
@endsection

