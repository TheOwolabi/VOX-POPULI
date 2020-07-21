@extends('layouts.app')


@section('content')
   <div class="container-fluid">
        <div class="col-md-6 mx-auto mt-4 bg-light shadow-sm p-4">
            <form action="{{route('categorie.update',$categorie)}}" method="post">  
                @method('PUT')
                @csrf

                <div class="form-group mt-3">
                    <label for="name">Veuillez indiquer le nom de la catégorie</label>
                    <input type="text" class="form-control col-md-5 @error('name') is-invalid @enderror" name="name" id="name" value="{{$categorie->name ?? old('name') }}">
                
                    @error('name')
                        <span class="invalid-feedback">
                            {{$message}}
                        </span>
                    @enderror
                </div>
                                
                <div class="form-group">
                    <label for="description">Décrivez brièvement la catégorie</label>

                    <textarea name="description" class="form-control" id="description" cols="20" rows="8">{{$categorie->description ?? old('description') }}</textarea>
                </div>  

                <div class="d-flex justify-content-center">
                    <button type="submit" class="btn btn-outline-primary shadow-sm ">MODIFIER CETTE CATEGORIE</button>
                </div>
            </form>
        </div>
   </div>
@endsection