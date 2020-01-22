<nav class="navbar navbar-expand-md navbar-light navbar-laravel">
    <div class="container">
        <a class="navbar-brand" href="{{ url('/manager/dashboard') }}">
            <img src="{{asset('storage/plantesaddict-logo-small.png')}}" height="40px" alt="">
        </a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
            <span class="sr-only">{!! trans('titles.toggleNav') !!}</span>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            {{-- Left Side Of Navbar --}}
            <ul class="navbar-nav mr-auto">
                @role('admin')
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        Contenu
                    </a>
                    <div class="dropdown-menu" aria-labelledby="navbarDropdown">

<a class="dropdown-item {{ Request::is('elfinder*') ? 'active' : null }}" target="_blank" href="{{url('/elfinder')}}">
    Explorer
</a>
<div class="dropdown-divider"></div>
                        <a class="dropdown-item {{ Request::is('manager/fiches*') ? 'active' : null }}" href="{{ url('/manager/fiches') }}">
                            Fiches d'entretien
                        </a>
                        <div class="dropdown-divider"></div>
                        <a class="dropdown-item {{ Request::is('manager/pages*') ? 'active' : null }}" href="{{ url('/manager/pages') }}">
                            Pages
                        </a>

                        <div class="dropdown-divider"></div>
                        <a class="dropdown-item {{ Request::is('manager/posts*') ? 'active' : null }}" href="{{ url('/manager/posts') }}">
                            Blog
                        </a>

                    </div>
                </li>

                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            eCommerce
                        </a>
                        <div class="dropdown-menu" aria-labelledby="navbarDropdown">

                            <a class="dropdown-item {{ Request::is('manager/ventes*') ? 'active' : null }}" href="{{ url('/manager/ventes') }}">
                                Ventes <span class="badge badge-success">{{count(\App\Models\Vente::where('is_public', true)->get())}} actives</span>
                            </a>
                            <div class="dropdown-divider"></div>
                            <a class="dropdown-item {{ Request::is('manager/products*') ? 'active' : null }}" href="{{ url('/manager/products') }}">
                              Produits <span class="badge badge-secondary">{{count(\App\Models\Product::all())}}</span>
                            </a>


                            <div class="dropdown-divider"></div>
                            <a class="dropdown-item {{ Request::is('manager/orders*') ? 'active' : null }}" href="{{ url('/manager/orders') }}">
                                Commandes <span data-toggle="tooltip" title="Commandes payées il y a moins de 24h" class="badge badge-success">{{count(\App\Models\Order::where('payment_status', true)->whereDate('updated_at', \Carbon\Carbon::today())->get())}}</span>

                            </a>
                            <div class="dropdown-divider"></div>
                            <a class="dropdown-item {{ Request::is('manager/payments*') ? 'active' : null }}" href="{{ url('/manager/payments') }}">
                                Paiements
                            </a>

                            <div class="dropdown-divider"></div>
                            <a class="dropdown-item {{ Request::is('manager/deliveries*') ? 'active' : null }}" href="{{ url('/manager/deliveries') }}">
                                Livraisons
                            </a>
                        </div>
                    </li>

                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            Utilisateurs
                        </a>
                        <div class="dropdown-menu" aria-labelledby="navbarDropdown">

                          <a class="dropdown-item {{ Request::is('manager/users/*', 'users/' . Auth::user()->id, 'users/' . Auth::user()->id . '/edit') ? 'active' : null }}" href="{{ url('manager/users') }}">
                              Utilisateurs <span class="badge badge-success">{{count(\App\Models\User::all())}}</span>
                          </a>
                          <div class="dropdown-divider"></div>
                                                        <a class="dropdown-item {{ (Request::is('roles') || Request::is('permissions')) ? 'active' : null }}" href="{{ route('laravelroles::roles.index') }}">
                                                            Roles & permissions
                                                        </a>
                                                        <div class="dropdown-divider"></div>


                            <a class="dropdown-item {{ Request::is('blocker') ? 'active' : null }}" href="{{ route('laravelblocker::blocker.index') }}">
                                {!! trans('titles.laravelBlocker') !!}
                            </a>
                        </div>
                    </li>

                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                          Réglages
                          </a>
                        <div class="dropdown-menu" aria-labelledby="navbarDropdown">


                            {{-- <a class="dropdown-item {{ Request::is('themes','themes/create') ? 'active' : null }}" href="{{ url('manager/themes') }}">
                                {!! trans('titles.adminThemesList') !!}
                            </a> --}}


                            <div class="dropdown-divider"></div>
                            <a class="dropdown-item {{ Request::is('phpinfo') ? 'active' : null }}" href="{{ url('manager/phpinfo') }}">
                                {!! trans('titles.adminPHP') !!}
                            </a>
                            <div class="dropdown-divider"></div>
                            <a class="dropdown-item {{ Request::is('routes') ? 'active' : null }}" href="{{ url('/routes') }}">
                                {!! trans('titles.adminRoutes') !!}
                            </a>

                            <div class="dropdown-divider"></div>
                            <a class="dropdown-item {{ Request::is('blocker') ? 'active' : null }}" href="{{ route('laravelblocker::blocker.index') }}">
                                {!! trans('titles.laravelBlocker') !!}
                            </a>
                        </div>
                    </li>


                                        <li class="nav-item dropdown">
                                            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                Logs
                                            </a>
                                            <div class="dropdown-menu" aria-labelledby="navbarDropdown">




                                                <a class="dropdown-item {{ Request::is('activity*') ? 'active' : null }}" href="{{ url('activity') }}">
                                                    Activités
                                                </a>
                                                <div class="dropdown-divider"></div>

                                                <a class="dropdown-item {{ Request::is('manager/logs*') ? 'active' : null }}" href="{{ url('manager/logs') }}">
                                                    Logs
                                                </a>


                                            </div>
                                        </li>
                @endrole
            </ul>
            {{-- Right Side Of Navbar --}}
            <ul class="navbar-nav ml-auto">
                {{-- Authentication Links --}}
                @guest
                    <li><a class="nav-link" href="{{ route('login') }}">{{ trans('titles.login') }}</a></li>
                    <li><a class="nav-link" href="{{ route('register') }}">{{ trans('titles.register') }}</a></li>
                @else
                    <li class="nav-item dropdown">
                        <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                            @if ((Auth::User()->profile) && Auth::user()->profile->avatar_status == 1)
                                <img src="{{ Auth::user()->profile->avatar }}" alt="{{ Auth::user()->name }}" class="user-avatar-nav">
                            @else
                                <div class="user-avatar-nav"></div>
                            @endif
                            {{ Auth::user()->name }} <span class="caret"></span>
                        </a>
                        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                          <a class="dropdown-item {{ Request::is('profile/'.Auth::user()->name, 'profile/'.Auth::user()->name . '/plantes*') ? 'active' : null }}" href="{{ url('/profile/'.Auth::user()->name. '/plantes') }}">
                              Mes plantes ({{count(Auth::user()->products)}})
                          </a>

                          <div class="dropdown-divider"></div>
                          <a class="dropdown-item {{ Request::is('profile/'.Auth::user()->name, 'profile/'.Auth::user()->name . '/commandes*') ? 'active' : null }}" href="{{ url('/profile/'.Auth::user()->name. '/commandes') }}">
                              Commandes ({{count(Auth::user()->orders)}})
                          </a>

                          <div class="dropdown-divider"></div>
                            <a class="dropdown-item {{ Request::is('profile/'.Auth::user()->name, 'profile/'.Auth::user()->name . '/edit') ? 'active' : null }}" href="{{ url('/profile/'.Auth::user()->name) }}">
                                Mes infos
                            </a>
                            <div class="dropdown-divider"></div>
                            <a class="dropdown-item" href="{{ route('logout') }}"
                               onclick="event.preventDefault();
                                             document.getElementById('logout-form').submit();">
                                {{ __('Déconnexion') }}
                            </a>
                            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                @csrf
                            </form>
                        </div>
                    </li>
                @endguest
            </ul>
        </div>
    </div>
</nav>

