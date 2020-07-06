@extends('layouts.app')

@section('content')
    <div class="container-fluid">
            @if ($officiels->isEmpty())
             @include('shared._empty',['model'=>'officiel','btn'=>'UN OFFICIEL', 'msg' => "aucun officiel n'a pour le moment été créé"]) 
            @else
             <p class="d-flex justify-content-center lead">
                <a href="{{route('officiel.create')}}" class="btn btn-success">AJOUTER UN OFFICIEL</a>
             </p>
             
             <div class="row mt-3">
                @foreach ($officiels as $officiel)
                <div class="col-md-5 mx-auto p-1 ">
                    <div class="card  shadow-sm mt-4">
                        <div class="card-header">
                            <div class="row">
                                <div class="col-md-9 pt-2">
                                <a href="" style="text-decoration: none;" class="mr-3"> {{$officiel->user->name}} </a> 
                                <span href="" class="badge badge-warning"> {{$officiel->poste->intitule}}</span>
                                </div>
                                <div class="col-md-3 pr-1">
                                <div class="float-right">                            
                                    <form style="display: inline-block;" action="{{route('officiel.destroy', $officiel->id)}}" method="POST">
                                        @method('DELETE')
                                        @csrf
                                        <input type="submit" class="btn btn-outline-danger" value="DESTITUER">
                                    </form>
                                </div>
                                </div>
                            </div>
                        </div>
    
                        <div class="card-body">
                            {{$officiel->poste->fiche}}
                        </div>
                    </div>   
                </div>
                @endforeach 
            </div>
            @endif
        </div>
    </div> 
@endsection