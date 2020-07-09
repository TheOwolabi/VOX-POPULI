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

            <main class="container">
                @if ($ideas->isEmpty())
                 @include('shared._empty',['model'=>'idea','btn'=>'UNE IDEE', 'msg' => "aucune idée n'a pour le moment été émise"]) 
                @else   
                    <div class="d-flex justify-content-center">
                        <a href="{{route('home')}}" class="btn btn-success">AJOUTER UNE IDEE</a>
                    </div>
                    <div class="row mt-4">
                        @foreach ($ideas as $idea)
                            <div class="m-b-md col-md-4">
                                <div class="card ">
                                    <div class="card-header"> 
                                        <div class="row">
                                        <div class="col-md-7 "> <a href="{{route('idea.show',$idea)}}">{{$idea->topic}} </a>  </div>
                                            <div class="col-md-5"> 
                                                <div class="d-flex flex-row-reverse">
                                                    @can('delete', $idea)
                                                        <a href="" class="icon delete" onclick="event.preventDefault(); document.getElementById('delete-{{$idea->id}}').submit();"> <i class="flaticon-delete"></i> </a>
                                                
                                                        <form id="delete-{{$idea->id}}" action="{{route('idea.destroy',$idea)}}" style="display:none;" method="post">
                                                        @method('DELETE')
                                                        @csrf
                                                        </form>
                                                    @endcan

                                                    @can('update', $idea)
                                                    <a  class=" icon edit" href="{{route('idea.edit',$idea)}}"> <i class="flaticon-pencil"></i> </a>
                                                    @endcan
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="card-body overflow-hidden"> 
                                        <div class="d-flex flex-row">
                                            <div class=""> 
                                                <div class=""> 
                                                 {!!Share::page(route('idea.show',$idea),'A découvrir !!!')->facebook()->twitter()->linkedin()->whatsapp();!!}
                                                </div>
                                            </div>
                                            <div class="p-2 my-auto"> 
                                                {{$idea->content}} 
                                            </div>
                                            
                                        </div>
                                    </div>
                                    <div class="card-footer">
                                        <div class="row">
                                            <div class="col-md-7 mt-2">
                                                <i class="fa fa-1x fa-user-circle" aria-hidden="true"></i> <span class="ml-2"> {{$idea->user->name}} </span>
                                            </div>
                                            <div class="border-dark mt-2">
                                                <a class="ml-3 p-2 icon pour {{$idea->Votebuttons_state() == 'up' ? $idea->Votebuttons_state() : "" }}" title="{{$idea->counter('vote','pour')}}" href="" onclick="event.preventDefault(); document.getElementById('upvote-form-{{$idea->id}}').submit();"><i class="flaticon-like"></i></a>
                                                <form action="/idea/{{$idea->id}}/vote" style="display: none;" id="upvote-form-{{$idea->id}}" method="post">
                                                    @csrf
                                                    <input type="hidden" name='vote' value="1">
                                                </form>

                                                <a class="p-2 icon contre {{$idea->Votebuttons_state() == 'down' ? $idea->Votebuttons_state() : "" }}" title="{{$idea->counter('vote','contre')}}" href="" onclick="event.preventDefault(); document.getElementById('downvote-form-{{$idea->id}}').submit();"><i class="flaticon-dislike"></i></a>
                                                <form action="/idea/{{$idea->id}}/vote" style="display: none;" id="downvote-form-{{$idea->id}}" method="post">
                                                    @csrf
                                                    <input type="hidden" name='vote' value="-1">
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div> 
                        @endforeach
                    </div>
                @endif
                </main>
        
        
        {{-- <script src="https://code.jquery.com/jquery-3.1.1.min.js"></script> --}}
        <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js" integrity="sha384-OgVRvuATP1z7JjHLkuOU7Xw704+h835Lr+6QL9UvYjZE3Ipu6Tp75j7Bh/kR0JKI" crossorigin="anonymous"></script>
        <script src="{{ asset('js/share.js') }}"></script>
        @include('notify::messages')
        @notifyJs
        <script>
            $(function () {
            $('[data-toggle="popover"]').popover()
            })
        </script>
    </body>
</html>
