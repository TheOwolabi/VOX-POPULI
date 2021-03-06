@extends('layouts.app')

@section('content')
<div class="row d-flex justify-content-center mt-4">
    <div class="col-md-8">
        <div id="idea" class="row no-gutters overflow-hidden flex-md-row mb-4 shadow-sm h-md-250 position-relative">
            <div class="col p-4 d-flex flex-column position-static">
                <div class="d-inline-block">
                    <div class="float-right mt-1">
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

                    <div class="float-left">
                      <a href="{{route('idea.show',$idea)}}">  <h2 class="mb-0" style="color: rgb(185, 158, 5)"> {{$idea->topic}} </h2> </a> 
                    </div>
                    <div class="d-flex justify-content-center">
                        @if($idea->status === 'rejeté')
                            <a href="#"  class="btn btn-reject">Non approuvée</a>
                        @endif 

                        @if($idea->status === 'traitement')
                        <a href="#"  class="btn btn-gold">Traitement en cours</a>
                        @endif 

                        @if($idea->status === 'validée')
                        <a href="#"  class="btn btn-validated">Approuvée</a>
                        @endif  
                     </div>
                </div>

                <div class="mb-1 text-muted">Nov 12</div>

                <div class="d-flex flex-row">
                    <div class=""> 
                        <div class=""> 
                        {!!Share::page(route('idea.show',$idea),'A découvrir !!!')->facebook()->twitter()->linkedin()->whatsapp();!!}
                        </div>
                    </div>
                    <div class="p-2 col-md-9 my-auto"> 
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
                    <center>  <i>An idea of</i>  <strong class="mb-2 text-primary"> {{strtoupper($idea->user->name)}}  </strong> </center>  
                </div>
            </div>
            @if ($idea->image_id)
                <div class="col-auto d-none d-lg-block">
                    <a href="{{route('idea.show',$idea)}}"> <img  width="200" height="340" src="{{ asset('storage/'.$idea->path())}}" alt="n">  </a>
                </div>  
            @endif
        </div>
    </div> 
</div>   

{{-- Creating comment form --}}
@include('shared.comment._create') 

{{-- Displaying comments --}}

<div class="container mt-5">
    @foreach ($comments as $comment)
    <div class="row d-flex justify-content-center">
       
            <div class="col-md-8">
                <div class="card p-3 mb-2">
                    <div class="d-flex justify-content-between align-items-center">
                        <div class="user d-flex flex-row align-items-center"> <img src="https://i.imgur.com/hczKIze.jpg" width="30" class="user-img rounded-circle mr-2"> <span><small class="font-weight-bold text-primary">{{ strtoupper($comment->user->name)}}</small> <small class="font-weight-bold">{{$comment->comment}}</small>
                    </div>
                    <div class="action d-flex justify-content-between mt-2 align-items-center">
                        <div class="reply px-4"> 
                            <small> 
                                <a class="icon pour {{$comment->Votebuttons_state() == 'up' ? $comment->Votebuttons_state() : "" }}"  href="" onclick="event.preventDefault(); document.getElementById('upvote-form-{{$comment->id}}').submit();"><i class="flaticon-like"></i></a>
                                <form action="/idea/{{$idea->id}}/comment/{{$comment->id}}/vote" style="display: none;" id="upvote-form-{{$comment->id}}" method="post">
                                    @csrf
                                    <input type="hidden" name='vote' value="1">
                    
                                    @if($comment->Votebuttons_state())
                                        @method('DELETE')
                                    @endif
                                </form>
                            </small> <span class="dots"></span> 
                            
                            <small>
                                <a class="icon contre {{$comment->Votebuttons_state() == 'down' ? $comment->Votebuttons_state() : "" }}"  href="" onclick="event.preventDefault(); document.getElementById('downvote-form-{{$comment->id}}').submit();"><i class="flaticon-dislike"></i></a>
                                <form action="/idea/{{$idea->id}}/comment/{{$comment->id}}/vote" style="display: none;" style="display: none;" id="downvote-form-{{$comment->id}}" method="post">
                                    @csrf
                                    <input type="hidden" name='vote' value="-1">
                                    
                                    @if($comment->Votebuttons_state())
                                        @method('DELETE')
                                    @endif
                                </form>
                            </small> <span class="dots"></span>     
                        </div>
                        
                        
                        <div class="icons align-items-center"> <i class="fa fa-star text-warning"></i> <i class="fa fa-check-circle-o check-icon"></i> </div>
                    </div>
                </div>
            </div>
        
    </div>
    @endforeach
</div>


 {{-- <div class="mt-4 card-body offset-md-2 ">
  @foreach ($comments as $comment)
    <div class="row"> 
        <div class="col-md-2 my-auto">
            <div  class="float-right"> Profile </div> <br>
            <div class="float-right"> {{ strtoupper($comment->user->name)}} </div>
        </div>
        <div class="col-md-6 bg-white border p-0 shadow-sm">
            <div class="border-bottom d-flex justify-content-center my-auto">
                 <span class="">Editing</span>   
            </div>
           
            <p class="p-2">
                {{$comment->comment}}
            </p>
            <div class="card-footer">
            </div>
        </div>
        <div class="ml-2 my-auto">
            <a class="icon pour {{$comment->Votebuttons_state() == 'up' ? $comment->Votebuttons_state() : "" }}"  href="" onclick="event.preventDefault(); document.getElementById('upvote-form-{{$comment->id}}').submit();"><i class="flaticon-like"></i></a>
            <form action="/idea/{{$idea->id}}/comment/{{$comment->commentable_id}}/vote" style="display: none;" id="upvote-form-{{$comment->id}}" method="post">
                @csrf
                <input type="hidden" name='vote' value="1">

                @if($comment->Votebuttons_state())
                    @method('DELETE')
                @endif
            </form>

            <a class="icon contre {{$comment->Votebuttons_state() == 'down' ? $comment->Votebuttons_state() : "" }}"  href="" onclick="event.preventDefault(); document.getElementById('downvote-form-{{$comment->id}}').submit();"><i class="flaticon-dislike"></i></a>
            <form action="/idea/{{$idea->id}}/comment/{{$comment->id}}/vote" style="display: none;" style="display: none;" id="downvote-form-{{$comment->id}}" method="post">
                @csrf
                <input type="hidden" name='vote' value="-1">
                
                @if($comment->Votebuttons_state())
                    @method('DELETE')
                @endif
            </form>
        </div>
        <br>
    </div>
  @endforeach
</div>  --}}
@endsection