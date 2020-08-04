<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Laravel</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">

        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">
        <link href="{{ asset('css/app.css') }}" rel="stylesheet">

        <!-- Styles -->
        <style>
            html, body {
                background-color: #fff;
                color: #636b6f;
                font-family: 'Nunito', sans-serif;
                font-weight: 200;
                height: 100vh;
                margin: 0px;
              
            }

            .full-height {
                height: 100vh;
            }

            .flex-center {
                align-items: center;
                display: flex;
                justify-content: center;
            }

            .position-ref {
                position: relative;
            }

            .top-right {
                position: absolute;
                right: 10px;
                top: 8px;
            }

            /* .content {
                text-align: center;
            } */

            .title {
                font-size: 84px;
            }

            .links > a {
                color: #636b6f;
                padding: 0 25px;
                font-size: 13px;
                font-weight: 600;
                letter-spacing: .1rem;
                text-decoration: none;
                text-transform: uppercase;
            }

            .m-b-md {
                margin-bottom: 30px;
            }
          
        </style>

        @notifyCss

        <link href="{{ asset('css/fontawesome/css/all.css') }}" rel="stylesheet">
        <link href="{{ asset('css/fontawesome/js/all.css') }}" rel="stylesheet">
        <link href="{{ asset('css/font/flaticon.css') }}" rel="stylesheet">
    </head>
    <body>
        <nav class="navbar navbar-expand-md navbar-light bg-white">
            <div class="container">
                <a class="navbar-brand" href="{{ url('/') }}">
                    {{ config('app.name', 'Laravel') }}
                </a>
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

        <main class="container-fluid px-5">
            @if ($ideas->isEmpty())
                @include('shared._empty',['model'=>'idea','btn'=>'UNE IDEE', 'msg' => "aucune idée n'a pour le moment été émise"]) 
            @else   
                <div class="d-flex justify-content-center">
                    <a href="{{route('home')}}" class="btn btn-success">AJOUTER UNE IDEE</a>
                </div>

                <div class="row mt-4 d-flex justify-content-center">
                    @foreach ($ideas as $idea)
                        <div class="col-md-5">
                            <div id="" class="row no-gutters border rounded overflow-hidden flex-md-row mb-4 shadow-sm h-md-250 position-relative">
                                <div class="col p-4 d-flex flex-column position-static">
                                    <div class="d-inline-block">
                                        <div class="float-left">
                                            @can('update', $idea)
                                                <a  class=" icon edit" href="{{route('idea.edit',$idea)}}"> <i class="flaticon-pencil"></i> </a>
                                            @endcan

                                            @can('delete', $idea)
                                                <a href="" class="icon delete" onclick="event.preventDefault(); document.getElementById('delete-{{$idea->id}}').submit();"> <i class="flaticon-delete"></i> </a>
                                        
                                                <form id="delete-{{$idea->id}}" action="{{route('idea.destroy',$idea)}}" style="display:none;" method="post">
                                                @method('DELETE')
                                                @csrf
                                                </form>
                                            @endcan
                                        </div>
                                    </div>
    
                                    <h3 class="mb-0"> 
                                        @if(strlen($idea->topic) > 24)
                                         <a href="{{route('idea.show',$idea)}}"> {{substr($idea->topic, 0, 25) . '...'}} </a>  
                                        @else
                                         <a href="{{route('idea.show',$idea)}}"> {{$idea->topic}} </a>
                                        @endif   
                                    </h3>

                                    <div class="mb-1 text-muted">Nov 12</div>

                                    <div class="d-flex flex-row">
                                        <div class=""> 
                                            <div class=""> 
                                            {!!Share::page(route('idea.show',$idea),'A découvrir !!!')->facebook()->twitter()->linkedin()->whatsapp();!!}
                                            </div>
                                            </div>
                                            <div class="p-2 col-md-10 my-auto"> 
                                                {{$idea->content}} 
                                            </div>   
                                            <div class="my-auto">
                                                <div class="mx-auto">
                                                   
                                                    <a href="" class="icon favorite {{$idea->isFavorited()}}" onclick="event.preventDefault(); document.getElementById('favorite-{{$idea->id}}').submit();"> <i class="flaticon-favourite"></i> </a>
                                
                                                    <form id="favorite-{{$idea->id}}" action="/idea/{{$idea->id}}/favorite" style="display:none;" method="post">
                                                        @csrf
                                                        @if($idea->isFavorited())
                                                            @method('DELETE')
                                                        @endif
                                                    </form>
                                                   
                                                <a class="icon pour {{$idea->Votebuttons_state() == 'up' ? $idea->Votebuttons_state() : "" }}" title="{{$idea->counter('vote','pour')}}" href="" onclick="event.preventDefault(); document.getElementById('upvote-form-{{$idea->id}}').submit();"><i class="flaticon-like"></i></a>
                                                <form action="/idea/{{$idea->id}}/vote" style="display: none;" id="upvote-form-{{$idea->id}}" method="post">
                                                    @csrf
                                                    <input type="hidden" name='vote' value="1">

                                                    @if($idea->Votebuttons_state())
                                                        @method('DELETE')
                                                    @endif
                                                </form>

                                                <a class="icon contre {{$idea->Votebuttons_state() == 'down' ? $idea->Votebuttons_state() : "" }}" title="{{$idea->counter('vote','contre')}}" href="" onclick="event.preventDefault(); document.getElementById('downvote-form-{{$idea->id}}').submit();"><i class="flaticon-dislike"></i></a>
                                                <form action="/idea/{{$idea->id}}/vote" style="display: none;" id="downvote-form-{{$idea->id}}" method="post">
                                                    @csrf
                                                    <input type="hidden" name='vote' value="-1">
                                                    
                                                    @if($idea->Votebuttons_state())
                                                        @method('DELETE')
                                                    @endif
                                                </form>
                                            </div>
                                        </div> 
                                    </div>
                                    
                                    <div>                           
                                        <center> 
                                             <i>An idea of</i>  <strong class="mb-2 text-primary"> {{strtoupper($idea->user->name)}}  </strong> <br>
                                        <i class="far fa-comment-alt"></i> <a href="{{route('idea.show',$idea)}}#com">Commenter</a>
                                            </center>  
                                    </div>
                                </div>
                                @if ($idea->image_id)
                                    <div class="col-auto d-none d-lg-block">
                                        <a href="{{route('idea.show',$idea)}}"> <img  width="200" height="360" src="{{ asset('storage/'.$idea->path())}}" alt="n">  </a>
                                    </div>  
                                @endif
                            </div>
                        </div>
                    @endforeach
                </div>
            @endif
        </main>        
        
        <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js" integrity="sha384-OgVRvuATP1z7JjHLkuOU7Xw704+h835Lr+6QL9UvYjZE3Ipu6Tp75j7Bh/kR0JKI" crossorigin="anonymous"></script>
        <script src="{{ asset('js/share.js') }}"></script>
        @include('notify::messages')
        @notifyJs
    </body>
</html>
