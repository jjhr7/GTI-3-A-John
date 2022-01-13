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
                    <a href="{{route('dashboard')}}"><i class="ik ik-home"></i><span>{{ __('Inicio')}}</span></a>
                </div>

                @if(auth()->user()->information->role->name == 'Super admin' || auth()->user()->information->role->name == 'Admin' || auth()->user()->information->role->name == 'Project Manager' )

                    <div class="nav-item {{ ($segment1 == 'users' || $segment1 == 'roles'||$segment1 == 'permission' ||$segment1 == 'user') ? 'active open' : '' }} has-sub">
                        <a href="#"><i class="ik ik-lock"></i><span>{{ __('Panel de administración')}}</span></a>
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

                <div class="nav-item {{ ($segment1 == 'reads') ? 'active open' : '' }}">
                    <a href="{{url('mediciones')}}" class="menu-item {{ ($segment1 == 'charts-chartist') ? 'active' : '' }}"><i class="ik ik-rss"></i>{{ __('Mediciones')}}</a>
                </div>


                <div class="nav-item {{ ($segment1 == 'perfil') ? 'active open' : ''  }}">
                    <a href="{{url('profile')}}" class="menu-item {{ ($segment1 == 'Perfil') ? 'active' : '' }}"><i class="ik ik-user"></i>{{ __('Perfil')}}</a>
                </div>


                <div class="nav-item {{ ($segment1 == 'mapa') ? 'active open' : ''  }}">
                    <a href="{{url('mapa')}}" class="menu-item {{ ($segment1 == 'mapa') ? 'active' : '' }}"><i class="ik ik-map"></i>{{ __('Mapa')}}</a>
                </div>

                <div class="nav-lavel">{{ __('Documentation')}} </div>
                <div class="nav-item {{ ($segment1 == 'rest-api') ? 'active' : '' }}">
                    <a href="{{url('rest-api')}}"><i class="ik ik-cloud"></i><span>{{ __('REST API')}}</span></a>
                </div>

        </div>
    </div>
</div>
