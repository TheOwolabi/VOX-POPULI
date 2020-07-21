<ul class="navbar-nav ml-auto">
    <!-- Authentication Links -->
    @guest
        <li class="nav-item">
            <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
        </li>
        @if (Route::has('register'))
            <li class="nav-item">
                <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
            </li>
        @endif
    @else
        <li class="nav-item dropdown">
            <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                {{ Auth::user()->name }} <span class="caret"></span>
            </a>

            <div id="nav" class="dropdown-menu dropdown-menu-right pl-5" aria-labelledby="navbarDropdown">
                <a class="dropdown-item" href="{{ route('home') }}">
                   Profile
                </a>
                <a class="dropdown-item" href="{{ route('officiel.index') }}">
                    Officiels
                </a>
                <a class="dropdown-item" href="{{ route('poste.index') }}">
                    Postes
                </a>
                <a class="dropdown-item" href="{{ route('metier.index') }}">
                    Métiers
                </a>
                <a class="dropdown-item" href="{{ route('categorie.index') }}">
                    Catégories
                </a>
                
                <a class="dropdown-item" href="{{ route('logout') }}"
                   onclick="event.preventDefault();
                                 document.getElementById('logout-form').submit();">
                    {{ __('Logout') }}
                </a>

                <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                    @csrf
                </form>

               
            </div>

           
            

        </li>
    @endguest
</ul>