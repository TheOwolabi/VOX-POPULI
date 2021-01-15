<!DOCTYPE html>
<html lang="en">
<head>
	<title>VOX-POPULI</title>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
<!--===============================================================================================-->	

<!--===============================================================================================-->
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">
    

<!-- Fonts -->
<link rel="dns-prefetch" href="//fonts.gstatic.com">
<link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

<!--===============================================================================================-->
<link href="../../css/fontawesome/css/all.css" rel="stylesheet">
<link href="../../css/fontawesome/js/all.css" rel="stylesheet">

<link href="../../css/font/flaticon.css" rel="stylesheet">

<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="../../css/login-util.css">
    <link rel="stylesheet" type="text/css" href="../../css/login-main.css">
	<link rel="stylesheet" type="text/css" href="../../css/idea.css">
    
<!--===============================================================================================-->
</head>
<body>
	<div id="app">
        <!-- Navigation -->
  <nav class="navbar navbar-expand-lg navbar-dark bg-dark fixed-top">
    <div class="container">
      <a class="vox" href="{{route('index')}}">VOX-POPULI</a>

      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarResponsive">
        <ul class="navbar-nav ml-auto">
            @guest
              @if (Route::has('login'))
                  <li class="nav-item">
                      <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                  </li>
              @endif
              
              @if (Route::has('register'))
                  <li class="nav-item">
                      <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                  </li>
              @endif
            @else
              <li class="nav-item active">
                <a class="dropdown-item" href="{{ route('idea.index') }}">
                  Répertoire
                </a>
              </li>
              <li class="nav-item active">
                <a class="dropdown-item" href="{{ route('home') }}">
                  Profile
                </a>
              </li>
              <li class="nav-item">
                <a class="dropdown-item" href="{{ route('officiel.index') }}">
                  Officiels
                </a>
              </li>
              <li class="nav-item">
                <a class="dropdown-item" href="{{ route('poste.index') }}">
                  Postes
              </a> 
              </li>
              <li class="nav-item">
                @can('view', Auth::user())
                <a class="dropdown-item" href="{{ route('stats') }}">
                    Statistiques
                </a>
                @endcan
              </li>
              <li class="nav-item">
                <a class="dropdown-item" href="{{ route('actualite.index') }}">
                  Actualites
                </a>
              </li>
              <li class="nav-item">
                <a class="dropdown-item" href="{{ route('metier.index') }}">
                  Métiers
                </a>
              </li>
              <li class="nav-item">
                <a class="dropdown-item" href="{{ route('categorie.index') }}">
                  Catégories
                </a>
              </li>
              <li class="nav-item dropdown">
                <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                    {{ Auth::user()->name }}
                </a>

                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                    <a class="dropdown-item" href="{{ route('logout') }}"
                      onclick="event.preventDefault();
                                    document.getElementById('logout-form').submit();">
                        {{ __('Logout') }}
                    </a>

                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                        @csrf
                    </form>
                </div>
            </li>
              @endguest
        </ul>
      </div>
    </div>
  </nav>
	<div class="limiter">
		<div class="container-login100" style="background-image: url(../../images/login.jpg);">
            @yield('content')
		</div>
	</div>
	

	<div id="dropDownSelect1"></div>
</div>
<!--===============================================================================================-->
  
<!--===============================================================================================-->

<!--===============================================================================================-->
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
<!--===============================================================================================-->

<!--===============================================================================================-->
	
<!--===============================================================================================-->

<!--===============================================================================================-->
	<script src="../../js/login-main.js"></script>

</body>
</html>