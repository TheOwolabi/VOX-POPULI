<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content="" />
        <meta name="author" content="" />
        <title>Grayscale - Start Bootstrap Theme</title>
        <link rel="icon" type="image/x-icon" href="images/acceuil/favicon.ico" />
        <!-- Font Awesome icons (free version)-->
        <script src="https://use.fontawesome.com/releases/v5.15.1/js/all.js" crossorigin="anonymous"></script>
        <!-- Google fonts-->
        <link href="https://fonts.googleapis.com/css?family=Varela+Round" rel="stylesheet" />
        <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet" />
        <!-- Core theme CSS (includes Bootstrap)-->
        <link href="css/acceuil.css" rel="stylesheet" />
    </head>
    <body id="page-top">
        <!-- Navigation-->
        <nav class="navbar navbar-expand-lg navbar-light fixed-top" id="mainNav">
            <div class="container">
                <a class="navbar-brand js-scroll-trigger" href="#page-top"><img src="/images/logo.png" height="100" alt="" srcset=""></a>
                <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
                    Menu
                    <i class="fas fa-bars"></i>
                </button>
                <div class="collapse navbar-collapse" id="navbarResponsive">
                    <ul class="navbar-nav ml-auto">
                        @guest
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                        </li>
                        @if (Route::has('register'))
                        @php
                            $bg = '../../images/login.jpg';
                        @endphp
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('register',['bg'=>'../../images/login.jpg']) }}">Register</a>
                            </li>
                        @endif
                    @else
                                <a class="nav-link" href="{{ route('logout') }}"
                                   onclick="event.preventDefault();
                                                 document.getElementById('logout-form').submit();">
                                    {{ __('Logout') }}
                                </a>
                
                                <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                    @csrf
                                </form>

                                <li>
                                    <a class="nav-link" href="{{ route('officiel.index') }}">
                                        Officiels
                                    </a>
                                </li>

                                <li class="nav-item">
                                    <a id="navbar" class="nav-link" href="{{ route('home') }}" role="button">
                                        {{ Auth::user()->name }} <span class="caret"></span>
                                    </a>
                                </li>
                
                               
                            </div>
                
                           
                            
                
                        </li>
                    @endguest
                    </ul>
                </div>
            </div>
        </nav>
        <!-- Masthead-->
        <header class="masthead">
            <div class="container d-flex h-100 align-items-center">
                <div class="mx-auto text-center">
                    <h1 class="mx-auto my-0 text-uppercase">Par le peuple, pour le peuple</h1>
                    <h2 class="text-white-50 mx-auto mt-2 mb-5">La plateforme numero une sur le developpement de votre commune </h2>
                    @guest
                     <a class="btn btn-outline-gold" href="{{route('register',['bg'=>'../../images/login.jpg'])}}">JE PARTICIPE</a>
                    @endguest
                </div>
            </div>
        </header>
        <!-- About-->
        <section class="about-section text-center" id="about">
            <div class="container">
                <div class="row">
                    <div class="col-lg-8 mx-auto">
                        <h2 class="text-white mb-4">VOTRE AVIS COMPTE</h2>
                        <p class="text-white-50">
                            La commune est l’un des principaux creusets de la vie associative. <a href="" style="color: gold;">VOX-POPULI</a> vous permet de contribuer à l’amélioration de votre cadre de vie en faisant connaitre votre avis.
                            Vos idées sont appréciées par vos concitoyens et soumis à l'appréciation des autorités communales. Lorsqu'elles sont validées, vos idées pourront devenir des projets portés par des élus locaux ou des équipes projets démocratiquement constituées grâce au processus de vote.
                        </p>
                    </div>
                </div>
            </div>
        </section>
        <!-- Projects-->
        <section class="projects-section bg-light mb-4" id="projects">
            <div class="container">
                <!-- Featured Project Row-->
                <div class="row align-items-center no-gutters mb-4 mb-lg-5">
                    {{-- <div class="col-xl-8 col-lg-7"><img class="img-fluid mb-3 mb-lg-0" src="images/acceuil/bg-masthead.jpg" alt="" /></div> --}}
                    <div class="mx-auto">
                        <div class="featured-text pl-4" style="padding-top: 34px;">
                            <h4 class="text-center">LA MISSION</h4>
                            <p class="text-black-50 mb-0">Offrir aux membres de la même commune la possibilité d’interagir productivement et de s’entraider. </p>
                        </div>
                    </div>
                </div>
                <!-- Project One Row-->
                {{-- <div class="row justify-content-center no-gutters mb-5 mb-lg-0">
                    <div class="col-lg-6"><img class="img-fluid" src="images/acceuil/demo-image-01.jpg" alt="" /></div>
                    <div class="col-lg-6">
                        <div class="bg-black text-center h-100 project">
                            <div class="d-flex h-100">
                                <div class="project-text w-100 my-auto text-center text-lg-left">
                                    <h4 class="text-white">Misty</h4>
                                    <p class="mb-0 text-white-50">An example of where you can put an image of a project, or anything else, along with a description.</p>
                                    <hr class="d-none d-lg-block mb-4 ml-0" />
                                    
                                    <a href="" class="circle like mr-2">  
                                        <i class="fas fa-thumbs-up"></i>
                                    </a>
                                    <a href="" class="circle dislike">  
                                        <i class="fas fa-thumbs-down"></i>
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div> --}}
                <!-- Project Two Row-->
                {{-- <div class="row justify-content-center no-gutters">
                    <div class="col-lg-6"><img class="img-fluid" src="images/acceuil/demo-image-02.jpg" alt="" /></div>
                    <div class="col-lg-6 order-lg-first">
                        <div class="bg-black text-center h-100 project">
                            <div class="d-flex h-100">
                                <div class="project-text w-100 my-auto text-center text-lg-right">
                                    <h4 class="text-white">Mountains</h4>
                                    <p class="mb-0 text-white-50">Another example of a project with its respective description. These sections work well responsively as well, try this theme on a small screen!</p>
                                    <hr class="d-none d-lg-block mb-0 mr-0" />
                                </div>
                            </div>
                        </div>
                    </div>
                </div> --}}
            </div>
        </section>
        <!-- Signup-->
        @guest
        <section class="signup-section mt-4" id="signup">
            <div class="container">
                <div class="row">
                    <div class="col-md-10 col-lg-8 mx-auto text-center">
                        
                        <a class="btn btn-outline-gold" href="{{route('register',['bg'=>'../../images/login.jpg'])}}">JE PARTICIPE</a>
                       
                    </div>
                </div>
            </div>
        </section>
        @endguest
        <!-- Contact-->
        <section style="min-height: 50rem;
        background: linear-gradient(to bottom, rgb(255 255 255) 0%, rgb(0 0 0 / 18%) 75%, #000000b0 100%), url(/images/foot.png?c5e51e1…);
        background-size: cover;"> 
         
          <a class="fbbut"href=""><i class="fab fa-facebook"></i></a> 
          <a class="instbut"href=""><i class="fab fa-instagram"></i></a> 
          <a class="twittbut"href=""><i class="fab fa-twitter"></i></a> 
        </section>
        <!-- Footer-->
        <footer class="footer bg-black small text-center text-white-50"><div class="container">Copyright © Your Website 2020</div></footer>
        <!-- Bootstrap core JS-->
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js"></script>
        <!-- Third party plugin JS-->
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-easing/1.4.1/jquery.easing.min.js"></script>
        <!-- Core theme JS-->
        <script src="js/acceuil.js"></script>
    </body>
</html>
