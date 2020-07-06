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
                padding-top: 40px;
            }

            a
            {
                color: #636b6f;
                text-decoration: none;
            }

            a:hover
            {
                text-decoration: none;
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

    <link href="{{ asset('css/font/flaticon.css') }}" rel="stylesheet">
    </head>
    <body>
        <div class="container">
            @if (Route::has('login'))
                <div class="top-right links">
                    @auth
                        <a href="{{ url('/home') }}">Home</a>
                    @else
                        <a href="{{ route('login') }}">Login</a>

                        @if (Route::has('register'))
                            <a href="{{ route('register') }}">Register</a>
                        @endif
                    @endauth
                </div>
            @endif

            <div class="content">
                @if ($ideas->isEmpty())
                 @include('shared._empty',['model'=>'idea','btn'=>'UNE IDEE', 'msg' => "aucune idée n'a pour le moment été émise"]) 
                @else
                    <div class="d-flex justify-content-center">
                        <a href="{{route('home')}}" class="btn btn-success">AJOUTER UNE IDEE</a>
                    </div>
                    <div class="row mt-4">
                        @foreach ($ideas as $idea)
                            <div class="m-b-md col-md-4">
                                <div class="card">
                                    <div class="card-header"> 
                                        <div class="row">
                                            <div class="col-md-7 "> {{$idea->topic}}   </div>
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
                                    <div class="card-body"> {{$idea->content}} </div>
                                    <div class="card-footer">
                                        <div class="row">
                                            <div class="col-md-7 mt-3">
                                                <span> {{$idea->user->name}} </span>
                                            </div>
                                            <div class="border-dark mt-3">
                                                <a class="ml-3 p-2 icon {{$idea->state() == 'up' ? $idea->state() : "" }}" title="{{$idea->counter('vote','pour')}}" href="" onclick="event.preventDefault(); document.getElementById('upvote-form-{{$idea->id}}').submit();"><i class="flaticon-like"></i></a>
                                                <form action="/idea/{{$idea->id}}/vote" style="display: none;" id="upvote-form-{{$idea->id}}" method="post">
                                                    @csrf
                                                    <input type="hidden" name='vote' value="1">
                                                </form>

                                                <a class="p-2 icon {{$idea->state() == 'down' ? $idea->state() : "" }}" title="{{$idea->counter('vote','contre')}}" href="" onclick="event.preventDefault(); document.getElementById('downvote-form-{{$idea->id}}').submit();"><i class="flaticon-dislike"></i></a>
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
            </div>
        </div>
        
        @include('notify::messages')
        @notifyJs
    </body>
</html>
