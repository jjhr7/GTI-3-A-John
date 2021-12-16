<div class="app-sidebar colored">
    <div class="sidebar-header">
        <a class="header-brand" href="{{route('dashboard')}}">
            <div class="logo-img">
               <!--<img height="30" src="{{ asset('img/logo_white.png')}}" class="header-brand-img" title="RADMIN">-->
                <h2 class="header-brand-img">MO2</h2>
            </div>
        </a>
        <div class="sidebar-action"><i class="ik ik-arrow-left-circle"></i></div>
        <button id="sidebarClose" class="nav-close"><i class="ik ik-x"></i></button>
    </div>

    @php
        $segment1 = request()->segment(1);
        $segment2 = request()->segment(2);
    @endphp

    <div class="sidebar-content">
        <div class="nav-container">
            <nav id="main-menu-navigation" class="navigation-main">
                <div class="nav-item {{ ($segment1 == 'dashboard') ? 'active' : '' }}">
                    <a href="{{route('dashboard')}}"><i class="ik ik-home"></i><span>{{ __('Panel de control')}}</span></a>
                </div>

                @if(auth()->user()->information->role->name == 'Super admin' || auth()->user()->information->role->name == 'Admin' || auth()->user()->information->role->name == 'Project Manager' )

                    <div class="nav-item {{ ($segment1 == 'users' || $segment1 == 'roles'||$segment1 == 'permission' ||$segment1 == 'user') ? 'active open' : '' }} has-sub">
                        <a href="#"><i class="ik ik-lock"></i><span>{{ __('Administrador')}}</span></a>
                        <div class="submenu-content">

                            <!-- only those have manage_user permission will get access -->
                            <a href="{{url('users')}}" class="menu-item {{ ($segment1 == 'users') ? 'active' : '' }}">{{ __('Usuarios')}}</a>
                            <a href="{{url('user/create')}}" class="menu-item {{ ($segment1 == 'user' && $segment2 == 'create') ? 'active' : '' }}">{{ __('Añadir usuarios')}}</a>



                            <!-- only those have manage_role permission will get access -->
                            <a href="{{url('roles')}}" class="menu-item {{ ($segment1 == 'roles') ? 'active' : '' }}">{{ __('Roles')}}</a>
                            <a href="{{url('role/createForm')}}" class="menu-item {{ ($segment1 == 'role' && $segment2 == 'createForm') ? 'active' : '' }}">{{ __('Añadir roles')}}</a>

                            <!-- only those have manage_permission permission will get access -->
                            <a href="{{url('permission')}}" class="menu-item {{ ($segment1 == 'permission') ? 'active' : '' }}">{{ __('Permisos')}}</a>
                            <a href="{{url('permission/createForm')}}" class="menu-item {{ ($segment1 == 'role' && $segment2 == 'createForm') ? 'active' : '' }}">{{ __('Añadir Permisos')}}</a>

                            <a href="{{url('towns')}}" class="menu-item {{ ($segment1 == 'towns') ? 'active' : '' }}">{{ __('Ciudades')}}</a>
                            <a href="{{url('town/createForm')}}" class="menu-item {{ ($segment1 == 'town' && $segment2 == 'createForm') ? 'active' : '' }}">{{ __('Añadir Ciudad')}}</a>
                            <a href="{{url('zonas')}}" class="menu-item {{ ($segment1 == 'zonas') ? 'active' : '' }}">{{ __('Zonas')}}</a>

                            <a href="{{url('healthytowns')}}" class="menu-item {{ ($segment1 == 'healthytowns') ? 'active' : '' }}">{{ __('Ciudades sanas')}}</a>

                            <a href="{{url('devices')}}" class="menu-item {{ ($segment1 == 'devices') ? 'active' : '' }}">{{ __('Devices')}}</a>
                            <a href="{{url('devices/createForm')}}" class="menu-item {{ ($segment1 == 'devices' && $segment2 == 'createForm') ? 'active' : '' }}">{{ __('Añadir Devices')}}</a>

                        </div>
                    </div>
                @endif
                <div class="nav-lavel">{{ __('Datos')}} </div>

                <div class="nav-item {{ ($segment1 == 'reads') ? 'active open' : '' }} has-sub">
                    <a href="#"><i class="ik ik-rss"></i><span>{{ __('Mediciones')}}</span> </a>
                    <div class="submenu-content">
                        <a href="{{url('mediciones')}}" class="menu-item {{ ($segment1 == 'charts-chartist') ? 'active' : '' }}">{{ __('Mediciones')}}</a>
                    </div>
                </div>

                <div class="nav-item {{ ($segment1 == 'charts-chartist' || $segment1 == 'charts-flot'||$segment1 == 'charts-knob'||$segment1 == 'charts-amcharts') ? 'active open' : '' }} has-sub">
                    <a href="#"><i class="ik ik-pie-chart"></i><span>{{ __('Gráficas')}}</span> </a>
                    <div class="submenu-content">
                        <a href="{{url('charts-chartist')}}" class="menu-item {{ ($segment1 == 'charts-chartist') ? 'active' : '' }}">{{ __('Chartist')}}</a>
                        <a href="{{url('charts-flot')}}" class="menu-item {{ ($segment1 == 'charts-flot') ? 'active' : '' }}">{{ __('Flot')}}</a>
                        <a href="{{url('charts-knob')}}" class="menu-item {{ ($segment1 == 'charts-knob') ? 'active' : '' }}">{{ __('Knob')}}</a>
                        <a href="{{url('charts-amcharts')}}" class="menu-item {{ ($segment1 == 'charts-amcharts') ? 'active' : '' }}">{{ __('Amcharts')}}</a>
                    </div>
                </div>

                <div class="nav-item {{ ($segment1 == 'calendario') ? 'active' : '' }}">
                    <a href="{{url('calendar')}}"><i class="ik ik-calendar"></i><span>{{ __('Calendario')}}</span></a>
                </div>

                <div class="nav-item {{ ($segment1 == 'tareas') ? 'active' : '' }}">
                    <a href="{{url('taskboard')}}"><i class="ik ik-file-text"></i><span>{{ __('Tareas')}}</span></a>
                </div>

                <div class="nav-item {{ ($segment1 == 'perfil' || $segment1 == 'Contrato') ? 'active open' : '' }} has-sub">
                    <a href="#"><i class="ik ik-user"></i><span>{{ __('Mi cuenta')}}</span></a>
                    <div class="submenu-content">
                        <a href="{{url('profile')}}" class="menu-item {{ ($segment1 == 'Perfil') ? 'active' : '' }}">{{ __('Perfil')}}</a>
                        <a href="{{url('invoice')}}" class="menu-item {{ ($segment1 == 'Contrato') ? 'active' : '' }}">{{ __('Contrato')}}</a>
                        <a href="{{url('project')}}" class="menu-item {{ ($segment1 == 'Proyecto') ? 'active' : '' }}">{{ __('Proyecto')}}</a>
                        <a href="{{url('view')}}" class="menu-item {{ ($segment1 == 'Vista general') ? 'active' : '' }}">{{ __('Vista general')}}</a>
                    </div>
                </div>
                <div class="nav-item {{ ($segment1 == 'Subscripciones') ? 'active' : '' }}">
                    <a href="{{url('pricing')}}"><i class="ik ik-dollar-sign"></i><span>{{ __('Subscripciones')}}</span></a>
                </div>

                <div class="nav-lavel">{{ __('Documentation')}} </div>
                <div class="nav-item {{ ($segment1 == 'rest-api') ? 'active' : '' }}">
                    <a href="{{url('rest-api')}}"><i class="ik ik-cloud"></i><span>{{ __('REST API')}}</span></a>
                </div>

        </div>
    </div>
</div>
