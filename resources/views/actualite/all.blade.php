@extends('layouts.app')

@section('content')  
    <div class="container-fluid">
        @if ($actualites->isEmpty())
        @include('shared._empty',['model'=>'actualite','btn'=>'UNE ACTUALITE', 'msg' => "aucune actualite n'a pour le moment été créée"]) 
        @else   
        <div class="d-flex justify-content-center">
            <a href="{{route('actualite.create')}}" class="btn btn-success">AJOUTER UNE ACTUALITE</a>
        </div>

        <div class="row mt-4 d-flex justify-content-center">
            @foreach ($actualites as $actualite)
                <div class="col-md-5">
                    <div id="" class="row no-gutters border rounded overflow-hidden flex-md-row mb-4 shadow-sm h-md-250 position-relative">
                        <div class="col p-4 d-flex flex-column position-static">
                            <div class="d-inline-block">
                                <div class="float-left">
                                    @can('update', $actualite)
                                        <a  class=" icon edit" href="{{route('actualite.edit',$actualite)}}"> <i class="flaticon-pencil"></i> </a>
                                    @endcan

                                    @can('delete', $actualite)
                                        <a href="" class="icon delete" onclick="event.preventDefault(); document.getElementById('delete-{{$actualite->id}}').submit();"> <i class="flaticon-delete"></i> </a>
                                
                                        <form id="delete-{{$actualite->id}}" action="{{route('actualite.destroy',$actualite)}}" style="display:none;" method="post">
                                        @method('DELETE')
                                        @csrf
                                        </form>
                                    @endcan
                                </div>
                            </div>

                            <h3 class="mb-0"> 
                                @if(strlen($actualite->title) > 30)
                                 <a href="{{route('actualite.show',$actualite)}}"> {{substr($actualite->title, 0, 33) . '...'}} </a>  
                                @else
                                 <a href="{{route('actualite.show',$actualite)}}"> {{$actualite->title}} </a>
                                @endif   
                            </h3>

                            <div class="mb-1 text-muted">Nov 12</div>

                            <div class="d-flex flex-row">
                                <div class=""> 
                                    <div class=""> 
                                    {!!Share::page(route('actualite.show',$actualite),'A découvrir !!!')->facebook()->twitter()->linkedin()->whatsapp();!!}
                                    </div>
                                </div>
                                <div class="p-2 col-md-10 my-auto"> 
                                    {{$actualite->description}} 
                                </div>   
                                <div class="my-auto">
                                    <div class="mx-auto">
                                        @can('favorite', $actualite)
                                            <a href="" class="icon favorite {{$actualite->isFavorited()}}" onclick="event.preventDefault(); document.getElementById('favorite-{{$actualite->id}}').submit();"> <i class="flaticon-favourite"></i> </a>
                        
                                            <form id="favorite-{{$actualite->id}}" action="/actualite/{{$actualite->id}}/favorite" style="display:none;" method="post">
                                                @csrf
                                                @if($actualite->isFavorited())
                                                    @method('DELETE')
                                                @endif
                                            </form>
                                        @endcan
                                        <a class="icon pour {{$actualite->Votebuttons_state() == 'up' ? $actualite->Votebuttons_state() : "" }}" title="{{$actualite->counter('vote','pour')}}" href="" onclick="event.preventDefault(); document.getElementById('upvote-form-{{$actualite->id}}').submit();"><i class="flaticon-like"></i></a>
                                        <form action="/actualite/{{$actualite->id}}/vote" style="display: none;" id="upvote-form-{{$actualite->id}}" method="post">
                                            @csrf
                                            <input type="hidden" name='vote' value="1">

                                            @if($actualite->Votebuttons_state())
                                                @method('DELETE')
                                            @endif
                                        </form>

                                        <a class="icon contre {{$actualite->Votebuttons_state() == 'down' ? $actualite->Votebuttons_state() : "" }}" title="{{$actualite->counter('vote','contre')}}" href="" onclick="event.preventDefault(); document.getElementById('downvote-form-{{$actualite->id}}').submit();"><i class="flaticon-dislike"></i></a>
                                        <form action="/actualite/{{$actualite->id}}/vote" style="display: none;" id="downvote-form-{{$actualite->id}}" method="post">
                                            @csrf
                                            <input type="hidden" name='vote' value="-1">
                                            
                                            @if($actualite->Votebuttons_state())
                                                @method('DELETE')
                                            @endif
                                        </form>
                                    </div>
                                </div> 
                            </div>
        
                            <div>                           
                                <center> 
                                     <i>An actuality of</i>  <strong class="mb-2 text-primary"> {{strtoupper($actualite->user->name)}}  </strong> <br>
                                <i class="far fa-comment-alt"></i> <a href="{{route('actualite.show',$actualite)}}#com">Commenter</a>
                                    </center>  
                            </div>
                        </div>
                        @if ($actualite->image_id)
                            <div class="col-auto d-none d-lg-block">
                                <a href="{{route('actualite.show',$actualite)}}"> <img  width="200" height="340" src="{{ asset('storage/'.$actualite->image->path)}}" alt="n">  </a>
                            </div>  
                        @endif
                    </div>
                </div>
            @endforeach
        </div>
    @endif
    </div>
@stop