@extends('layouts.app')

@section('content')
<div class="row d-flex justify-content-center mt-4">
    <div class="m-b-md col-md-6">
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
            <div class="card-body"> 
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
                    <div class="col-md-9 mt-3">
                        <i class="fa fa-user-circle" aria-hidden="true"></i>     <span> {{$idea->user->name}} </span>
                    </div>
                    <div class="border-dark mt-3 ml-4">
                        <a class="ml-3 p-2 icon pour {{$idea->state() == 'up' ? $idea->state() : "" }}" title="{{$idea->counter('vote','pour')}}" href="" onclick="event.preventDefault(); document.getElementById('upvote-form-{{$idea->id}}').submit();"><i class="flaticon-like"></i></a>
                        <form action="/idea/{{$idea->id}}/vote" style="display: none;" id="upvote-form-{{$idea->id}}" method="post">
                            @csrf
                            <input type="hidden" name='vote' value="1">
                        </form>

                        <a class="p-2 icon contre {{$idea->state() == 'down' ? $idea->state() : "" }}" title="{{$idea->counter('vote','contre')}}" href="" onclick="event.preventDefault(); document.getElementById('downvote-form-{{$idea->id}}').submit();"><i class="flaticon-dislike"></i></a>
                        <form action="/idea/{{$idea->id}}/vote" style="display: none;" id="downvote-form-{{$idea->id}}" method="post">
                            @csrf
                            <input type="hidden" name='vote' value="-1">
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div> 
</div>   
@endsection