
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<meta name="viewport"    content="width=device-width, initial-scale=1.0">
	<meta name="description" content="">
	<meta name="author"      content="Sergey Pozhilov (GetTemplate.com)">
	
	<title>Coming Soon html5 template by GetTemplate</title>

	<link rel="shortcut icon" href="assets/images/gt_favicon.png">
	
	<!-- Icons -->
	<link href="http://netdna.bootstrapcdn.com/font-awesome/4.0.3/css/font-awesome.css" rel="stylesheet"> 
	<!-- Fonts -->
	<link rel="stylesheet" href="http://fonts.googleapis.com/css?family=Open+Sans:300,400,700"> 
	<!-- Custom styles -->
	<link rel="stylesheet" href="admin/superawesome/SuperAwesome/assets/css/styles.css">
	<!-- Bootstrap itself -->
	<link href="http://netdna.bootstrapcdn.com/bootstrap/3.1.0/css/bootstrap.min.css" rel="stylesheet" type="text/css">

	<link href="{{ asset('css/font/flaticon.css') }}" rel="stylesheet">

    
	<script src="{{ asset('admin/superawesome/SuperAwesome/assets/js/app.js') }}" defer></script>
	<!--[if lt IE 9]> <script src="assets/js/html5shiv.js"></script> <![endif]-->
</head>

<body >

<!-- Header -->
<header class="header">
	<nav class="navbar navbar-expand-md navbar-light bg-white">
		<div class="container">          
            <div class="row">
                <div class="col-md-9">
                    <a class="navbar-brand" href="{{ url('/') }}">
                        {{ config('app.name', 'Laravel') }}
                    </a>
                </div>

                <div class="col-md-3">
                    <ul class=navbar>
                        <!-- Authentication Links -->
                        @guest
                            <li style="display:inline-block;" >
                                <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                            </li>
                            @if (Route::has('register'))
                                <li >
                                    <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                                </li>
                            @endif
						@else
								<li style="display:inline-block;">
									<a href="{{ route('logout') }}"
									onclick="event.preventDefault();
													document.getElementById('logout-form').submit();">
										{{ __('Logout') }}
									</a>
								

									<form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
										@csrf
									</form>
								</li>

                                <li style="display:inline-block;">
                                    <a class="nav-link" href="{{ route('officiel.index') }}">
                                        Officiels
                                    </a>
                                </li>

                                <li style="display:inline-block;">
                                    <a id="navbar" class="nav-link" href="{{ route('home') }}" role="button">
                                        {{ Auth::user()->name }} <span class="caret"></span>
                                    </a>
                                </li>
                        @endguest
                    </ul>   
                </div>             
			</div>
		</div>
	</nav>
	<div class="container mt-1">
		<div class="row">
			<div class="">
				<h1>Interface d'administration</h1>
				{{-- <h2>by GetTemplate</h2> --}}
				
				<div class="font">
					@foreach ($ideas as $idea)
					<div class="card">
						<div class="card-header ">
							<div class="row">
								<div class="col-md-4">
								</div>
								<div class="title col-md-5 text-center pt-2">
									<div>
									  <h2 class="top"> {{$idea->user->name}} : <a href="{{route('idea.show',$idea)}}">  {{$idea->topic}} </a></h2> 
									</div>
									<div class="stats">
										<span class="chiffre">{{$idea->counter('vote','pour')}}</span>
										<span > <i class="flaticon-like"></i> </span> 
										<span class="chiffre">{{$idea->counter('vote','contre')}}</span>
										<span class="contre"> <i class="flaticon-dislike"></i>  </span> 
									</div>
									<div>
										<a href="#" class="{{($idea->status == 'rejeté') ? 'btn btn-reject' : 'btn btn-outline-reject'  }} " onclick="event.preventDefault(); document.getElementById('reject-{{$idea->id}}').submit();">Non approuvée</a>
										<a href="" class="{{($idea->status == 'traitement') ? 'btn btn-gold' : 'btn btn-outline-gold'  }}"  onclick="event.preventDefault(); document.getElementById('treatment-{{$idea->id}}').submit();">Traitement</a>
										<a href=""  class="{{($idea->status == 'validée') ? 'btn btn-validated' : 'btn btn-outline-validated'}}"  onclick="event.preventDefault(); document.getElementById('approved-{{$idea->id}}').submit();">Validée</a>
										<form action="{{route('status',$idea)}}" id="reject-{{$idea->id}}" style="display: none;" method="post">
											@csrf
										<input type="text" name="status" value="rejeté">
										</form>
		
										<form action="{{route('status',$idea)}}" id="treatment-{{$idea->id}}" style="display: none;" method="post">
											@csrf
										<input type="text" name="status" value="traitement">
										</form>
		
										<form action="{{route('status',$idea)}}" id="approved-{{$idea->id}}" style="display: none;" method="post">
											@csrf
										<input type="text" name="status" value="validée">
										</form>
									</div>
								</div>
								<div class="col-md-3">
									{{-- <div class="stats">
										<span > <i class="flaticon-like"></i> </span> 
										<span class="chiffre">{{$idea->counter('vote','pour')}}</span>

		
										<span class="contre"> <i class="flaticon-dislike"></i>  </span> 
		
										<span class="chiffre">{{$idea->counter('vote','contre')}}</span>
									</div> --}}
								</div>
							</div>
						</div>
						<div class="card-body text-center">
							<p class="lead">
								<hr>
							</p>
							
						</div>
					</div>	
					@endforeach
			    </div>
				{{-- <p>SuperAwesome thing is currently in active development and will be released this summer.<br>
					In the meantime, please register to our waiting list to get notified first once something is launched.</p>
					<br>
				
				<form class="form-inline" role="form">
					<div class="form-group"><input type="text" class="form-control input-lg" id="exampleInputEmail2" placeholder="Your Name"></div>
					<div class="form-group"><input type="text" class="form-control input-lg" id="exampleInputPassword2" placeholder="Your Email"></div>
					<button type="submit" class="btn btn-lg btn-default">Subscribe</button>
				</form>
				<p class="small text-muted">Powered by Mailchimp. Unsubscribe at any time.</p> --}}
			</div>
		</div>
		<div class="row">
			<div class="col-lg-12">
				<div id="illustration">
					{{-- <img src="admin/superawesome/SuperAwesome/assets/images/ap-screenshot.png" alt="" > --}}
				</div>
			</div>
		</div>
	</div>
</header>
<!-- /Header -->
	

<!-- Content -->
@yield('content')

<footer id="footer" class="jumbotron">
	<section class="container">
		<div class="row">
				<div class="col-md-5 col-md-push-1">
					<h2></h2>
					<p>Lorem, ipsum dolor sit amet consectetur adipisicing elit. Molestias, at.</p>
					<!-- AddThis Button BEGIN -->
					<div class="addthis_toolbox addthis_default_style addthis_32x32_style">
					<a class="addthis_button_facebook"></a>
					<a class="addthis_button_twitter"></a>
					<a class="addthis_button_linkedin"></a>
					<a class="addthis_button_google_plusone_share"></a>
					<a class="addthis_button_compact"></a><a class="addthis_counter addthis_bubble_style"></a>
					</div>
					<script type="text/javascript">var addthis_config = {"data_track_addressbar":true};</script>
					<script type="text/javascript" src="//s7.addthis.com/js/300/addthis_widget.js#pubid=ra-536ba34f3dab1f93"></script>
					<!-- AddThis Button END -->
					
				</div>
				<div class="col-md-5 col-md-push-1">
					<h2>Need help?</h2>
					<p>For help with this or another template you've downloaded from GetTemplate, please email me at gt@gettemplate.com. </p>
					<p>If you'd like to report a bug or suggest an improvement, please post and issue on <a href="https://github.com/pozh/">GitHub</a> </p>
				</div>
		</div>	
	</section>
</footer>

<p class="small text-muted text-center">Copyright &copy; 2014, Your name. Design by: <a href="http://gettemplate.com/" rel="designer" title="Free Bootstrap templates">GetTemplate</a></p>
<br>



<!-- JavaScript libs are placed at the end of the document so the pages load faster -->
<script src="https://code.jquery.com/jquery-3.1.1.min.js"></script>
<script src="admin/superawesome/SuperAwesome/assets/js/template.js"></script>
<script src="{{ asset('admin/superawesome/SuperAwesome/assets/js/share.js') }}"></script>
</body>
</html>