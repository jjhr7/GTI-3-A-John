<header class="header-top" header-theme="light">
    <div class="container-fluid">
        <div class="d-flex justify-content-between">
            <div class="top-menu d-flex align-items-center">
                <button type="button" class="btn-icon mobile-nav-toggle d-lg-none"><span></span></button>

                <button class="nav-link" title="clear cache">
                    <a  href="{{url('clear-cache')}}">
                    <i class="ik ik-battery-charging"></i>
                </a>
                </button> &nbsp;&nbsp;
                <button type="button" id="navbar-fullscreen" class="nav-link"><i class="ik ik-maximize"></i></button>
            </div>
            <div class="top-menu d-flex align-items-center">
                <div class="dropdown">
                    <a class="nav-link dropdown-toggle" href="#" id="notiDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><i class="ik ik-bell"></i><span class="badge bg-danger">{{count(auth()->user()->notifications)}}</span></a>
                    <div class="dropdown-menu dropdown-menu-right notification-dropdown" aria-labelledby="notiDropdown">
                        <h4 class="header">{{ __('Notificaciones')}}</h4>
                        <div class="notifications-wrap">

                            @if(auth()->user()->notifications != null)

                                @foreach(auth()->user()->notifications as $notification)
                                    <a href="#" class="media">
                                        <span class="d-flex">
                                            <i class="ik ik-info"></i>
                                        </span>
                                        <span class="media-body">
                                            <span class="heading-font-family media-heading">{{ __($notification->type)}}</span>
                                            <span class="media-content">{{ __($notification->message)}}</span>
                                        </span>
                                    </a>
                                @endforeach
                            @else
                                <span class="media-body">
                                            Este usuario aún no tiene notificaciones.
                                </span>
                            @endif
                        </div>
                    </div>
                </div>

                <div class="dropdown">
                    <a class="dropdown-toggle" href="#" id="userDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><img class="avatar" src="{{ asset('img/user.jpg')}}" alt=""></a>
                    <div class="dropdown-menu dropdown-menu-right" aria-labelledby="userDropdown">
                        <a class="dropdown-item" href="{{url('profile')}}"><i class="ik ik-user dropdown-icon"></i> {{ __('Perfil')}}</a>
                        <a class="dropdown-item" href="{{ url('logout') }}">
                            <i class="ik ik-power dropdown-icon"></i>
                            {{ __('Cerrar sesión')}}
                        </a>
                    </div>
                </div>

            </div>
        </div>
    </div>
</header>
