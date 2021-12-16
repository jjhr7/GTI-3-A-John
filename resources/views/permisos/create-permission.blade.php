@extends('layouts.main')
@section('title', 'Permisos')
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
                            <h5>{{ __('Permissions')}}</h5>
                            <span>{{ __('Define permissions of user')}}</span>
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
                                <a href="#">{{ __('Permissions')}}</a>
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
                    <div class="card-header"><h3>{{ __('Add Permission')}}</h3></div>
                    <div class="card-body">
                        <form class="forms-sample" method="POST" action="{{url('permission/create')}}">
                            @csrf
                            <div class="row">
                                <div class="col-sm-5">
                                    <div class="form-group">
                                        <label for="permission">{{ __('Name')}}<span class="text-red">*</span></label>
                                        <input type="text" class="form-control is-valid" id="permission" name="permission" placeholder="Permission Name" required>
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
