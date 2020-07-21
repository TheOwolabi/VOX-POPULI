@extends('layouts.app')

@section('content')
    <div class="container-fluid">
            @if ($categories->isEmpty())
             @include('shared._empty',['model'=>'categorie','btn'=>'UNE CATEGORIE', 'msg' => "aucune catégorie n'a pour le moment été créée"]) 
            @else
             <p class="d-flex justify-content-center lead">
                <a href="{{route('categorie.create')}}" class="btn btn-success">AJOUTER UNE CATEGORIE</a>
             </p>
             
             <div class="row mt-3">
                @foreach ($categories as $categorie)
                <div class="col-md-4 mx-auto p-1 ">
                    <div class="card  shadow-sm mt-4">
                        <div class="card-header">
                            <div class="row">
                                <div class="col-md-9 pt-2">
                                <a href="" style="text-decoration: none;" class="mr-3"> {{$categorie->name}} </a> 
                                </div>
                                <div class="col-md-3 pr-1">
                                    <div class="float-right">      
                                        <a href="{{route('categorie.edit',$categorie->id)}}" class=" icon edit">  <i class="flaticon-pencil"></i> </a>

                                        <a href="" class="icon delete" onclick="event.preventDefault(); document.getElementById('delete-{{$categorie->id}}').submit();"> <i class="flaticon-delete"></i> </a>
                            
                                        <form id="delete-{{$categorie->id}}" action="{{route('categorie.destroy',$categorie)}}" style="display:none;" method="post">
                                        @method('DELETE')
                                        @csrf
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="card-body pb-3">
                            {{$categorie->description ?? '-'}}
                         </div>
                    </div>   
                </div>
                @endforeach 
            </div>
            @endif
        </div>
    </div> 
@endsection