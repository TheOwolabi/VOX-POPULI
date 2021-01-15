@extends('layouts.app')

@section('content')  
<main class="container-fluid px-5">
    @if ($ideas->isEmpty())
        @include('shared._empty',['model'=>'idea','btn'=>'UNE IDEE', 'msg' => "aucune idée n'a pour le moment été émise"]) 
    @else   
        <div class="d-flex justify-content-center">
            <a href="{{route('home')}}" class="btn btn-success">AJOUTER UNE IDEE</a>
        </div>

        <div class="row mt-4 d-flex justify-content-center">
            @foreach ($ideas as $idea)
                <div class="col-md-5" style="color: whitesmoke">
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
                                 <a href="{{route('idea.show',$idea)}}"> <H3 class="title">{{substr($idea->topic, 0, 25) . '...'}} </H3></a>  
                                @else
                                 <a href="{{route('idea.show',$idea)}}"> {{$idea->topic}} </a>
                                @endif   

                                @if($idea->status === 'rejeté')
                                    <a href="#"  class="btn btn-reject">Non approuvée</a>
                                @endif 

                                @if($idea->status === 'traitement')
                                <a href="#"  class="btn btn-gold">Traitement en cours</a>
                                @endif 

                                @if($idea->status === 'validée')
                                <a href="#"  class="btn btn-validated">Approuvée</a>
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
                                     <i></i>  <strong class="mt-2 mb-2 text-primary"> {{strtoupper($idea->user->name)}}  </strong> <br>
                                <i class="far fa-comment-alt"></i> <a href="{{route('idea.show',$idea)}}#com">Commenter</a>
                                    </center>  
                            </div>
                        </div>
                        @if ($idea->image_id)
                            <div class="col-auto d-none d-lg-block">
                                <a href="{{route('idea.show',$idea)}}"> <img  width="200" height="360" src="storage/'.$idea->path())}}" alt="n">  </a>
                            </div>  
                        @endif
                    </div>
                </div>
            @endforeach
        </div>
    @endif
</main>        
@stop