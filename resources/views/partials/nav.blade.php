<nav class="navbar navbar-expand-md navbar-light navbar-laravel">
    <div class="container">
        <a class="navbar-brand" href="{{ url('/') }}">
            <img src="{{asset('storage/plantesaddict-logo-small.png')}}" height="40px" alt="">
        </a>
        <div>

          <a href="{{ URL::previous() }}" title="Retour en arrière" class="header-wrapicon2">
  <i class="fa fa-arrow-left  text-secondary" style="font-size: 20px;"></i>
  

        </a>

          <a href="{{ url("ventes") }}" title="Retour en arrière" class="header-wrapicon2">
  <i class=" fa fa-store-alt  text-secondary" style="font-size: 20px;"></i>
 

        </a>

  <a href="{{url("panier")}}" title="Voir mes paniers" class="header-wrapicon2  text-secondary" style="font-size: 20px;">
  <i class=" fa fa-shopping-cart"></i>
  @if(Cart::count() > 0)
    <span class=" header-icons-noti">{{Cart::count()}}</span>

  @endif

        </a>
      </div>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
            <span class="sr-only">{!! trans('titles.toggleNav') !!}</span>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            {{-- Left Side Of Navbar --}}
            {{-- <ul class="navbar-nav mr-auto">

            </ul> --}}
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
                          <a class="dropdown-item"  href="{{ url('panier') }}">
                            Mon panier
                          </a>

                          <div class="dropdown-divider"></div>

                          <a class="dropdown-item {{ Request::is('profile/'.Auth::user()->name, 'profile/'.Auth::user()->name . '/plantes*') ? 'active' : null }}" href="{{ url('/profile/'.Auth::user()->name. '/plantes') }}">
                              Mes plantes ({{count(Auth::user()->products)}})
                          </a>

                          <div class="dropdown-divider"></div>
                          <a class="dropdown-item {{ Request::is('profile/'.Auth::user()->name, 'profile/'.Auth::user()->name . '/commandes*') ? 'active' : null }}" href="{{ url('/profile/'.Auth::user()->name. '/commandes') }}">
                              Commandes ({{count(Auth::user()->orders)}})
                          </a>

                          <div class="dropdown-divider"></div>
                            <a class="dropdown-item {{ Request::is('profile/'.Auth::user()->name, 'profile/'.Auth::user()->name . '/edit') ? 'active' : null }}" href="{{ url('/profile/'.Auth::user()->name.'/edit') }}">
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


