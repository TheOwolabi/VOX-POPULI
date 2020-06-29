@extends('layouts.app')

@section('content')
    <div class="container-fluid">
            @if ($officiels->isEmpty())
                <div class="d-flex justify-content-center">
                    <div class="jumbotron">
                        <h1 class="display-4">Désolé</h1>
                        <p class="lead">Nous constatons avec regret qu'aucun officiel n'a pour le moment été nommé. Nous vous invitons fortement à commencer tout de suite. </p>
                        <hr class="my-4">
                        <p class="lead d-flex justify-content-center">
                            <a href="{{route('officiel.create')}}" class="btn btn-success">AJOUTER UN OFFICIEL</a>
                        </p>
                    </div>
                </div>
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