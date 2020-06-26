@extends('layouts.app')


@section('content')
   <div class="container-fluid">
        <div class="col-md-6 mx-auto mt-4 bg-light shadow-sm p-4">
            <form action="{{route('metier.store')}}" method="post">  
                @csrf

                <div class="form-group mt-3">
                    <label for="title">Veuillez indiquer le nom de votre profession</label>
                    <input type="text" class="form-control col-md-5 @error('title') is-invalid @enderror" name="title" id="title" value="{{$metier->title ?? old('title') }}">
                
                    @error('title')
                        <span class="invalid-feedback">
                            {{$message}}
                        </span>
                    @enderror
                </div>
                                
                <div class="form-group">
                    <label for="description">Décrivez brièvement vos compétences</label>

                    <textarea name="description" class="form-control" id="description" cols="20" rows="8">{{$metier->description ?? old('description') }}</textarea>
                </div>  

                <div class="d-flex justify-content-center">
                    <button type="submit" class="btn btn-outline-primary shadow-sm ">AJOUTER CE METIER</button>
                </div>
            </form>
        </div>
   </div>
@endsection