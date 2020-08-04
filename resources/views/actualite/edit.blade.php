@extends('layouts.app')

@section('content')
    <div class="container mt-4 ">
        <div class="col-md-8 mx-auto mt-4 bg-light shadow-sm p-4 ">
            <form action="{{route('actualite.update',$actualite)}}" class="" method="post" enctype="multipart/form-data">  
                @method('PUT')
                @csrf

                <center>
                    <div class="form-group mt-3">
                        <label for="file-upload" class="btn btn-primary">
                            <i class="fa fa-upload"></i> Custom Upload
                        </label>
                        <input id="file-upload" name="cover" type="file"/>
                        
                        @error('cover')
                            <span class="invalid-feedback">
                                {{$message}}
                            </span>
                        @enderror
                    </div>
                </center>


                <center>
                <div class="form-group mt-3">
                    <label for="title"><strong>Titre</strong></label>
                    <input type="text" class="form-control  @error('title') is-invalid @enderror" name="title" id="title" value="{{$actualite->title ?? old('title') }}">
                
                    @error('title')
                        <span class="invalid-feedback">
                            {{$message}}
                        </span>
                    @enderror
                </div>
                </center>

                
                <div class="form-group ">
                    <center> <label for="categorie"><strong>Catégorie</strong></label> 

                        <select name="categorie" id="categorie" class="form-control @error('categorie') is-invalid @enderror">
                            <option value="{{$actualite->categorie->id}}" > {{$actualite->categorie->name ?? old('categorie') }} </option>
                            @foreach ($categories as $categorie)
                                @if ($categorie->name != $actualite->categorie->name  )
                                    <option value="{{$categorie->id}}"> {{$categorie->name}} </option> 
                                @endif
                            @endforeach
                        </select>
                    
                        @error('categorie')
                            <span class="invalid-feedback">
                                {{$message}}
                            </span>
                        @enderror
                    </center>
                </div>
                                
                <div class="form-group ">
                    <center> <label for="description"><strong>Description</strong></label> 
                        <textarea name="description" class="form-control rounded-0 @error('description') is-invalid @enderror" id="description" cols="20" rows="8">{{$actualite->description ?? old('description') }}</textarea>
                    
                        @error('description')
                        <span class="invalid-feedback">
                            {{$message}}
                        </span>
                        @enderror
                    </center>
                </div>  

                <div class="d-flex justify-content-center">
                    <button type="submit" class="btn btn-outline-primary shadow-sm ">MODIFIER CETTE ACTU</button>
                </div>
            </form>
        </div>
    </div>
@endsection