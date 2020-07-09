@extends('layouts.app')

@section('content')  
    <div class="container-fluid">
        @if ($metiers->isEmpty())
        @include('shared._empty',['model'=>'metier','btn'=>'UN METIER', 'msg' => "aucun métier n'a pour le moment été créé"]) 
        @else
        <div class="d-flex justify-content-center">
            <a href="{{route('metier.create')}}" class="btn btn-success">AJOUTER METIER</a>
        </div>

        @foreach ($metiers as $metier)
         <div class="col-md-8 mx-auto">
             <div class="card mt-4">
                 <div class="card-header">
                     <div class="row">
                         <div class="col-md-9">
                            {{$metier->title}} 
                         </div>
                         <div class="col-md-3 pr-1">
                            <div class="float-right">
                                <a href="{{route('metier.edit',$metier->id)}}" class="icon edit"> <i class="flaticon-pencil"></i> </a>
                            
                                <a href="" class="icon delete" onclick="event.preventDefault(); document.getElementById('delete-{{$metier->id}}').submit();"> <i class="flaticon-delete"></i> </a>
                        
                                <form id="delete-{{$metier->id}}" action="{{route('metier.destroy',$metier)}}" style="display:none;" method="post">
                                @method('DELETE')
                                @csrf
                                </form>
                            </div>
                         </div>
                     </div>
                 </div>

                 <div class="card-body pl-4 pb-3">
                    {{$metier->description ?? '-'}}
                 </div>
             </div>
            
        </div>
     @endforeach
     @endif
    </div> 
@endsection