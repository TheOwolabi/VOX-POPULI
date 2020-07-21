@extends('layouts.app')

@section('content')
    <div class="container mt-4 ">
        <div class="col-md-8 mx-auto mt-4 bg-light shadow-sm p-4 ">
            <form action="{{route('idea.update',$idea)}}" class="" method="post" enctype="multipart/form-data">  
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
                    <label for="topic"><strong>Titre</strong></label>
                    <input type="text" class="form-control  @error('topic') is-invalid @enderror" name="topic" id="topic" value="{{$idea->topic ?? old('topic') }}">
                
                    @error('topic')
                        <span class="invalid-feedback">
                            {{$message}}
                        </span>
                    @enderror
                </div>
                </center>

                <div class="form-group ">
                    <center> <label for="subtitle"><strong>Sous-titre</strong></label> 
                        <textarea name="subtitle" class="form-control rounded-0 @error('subtitle') is-invalid @enderror" id="subtitle" cols="1" rows="3">{{$idea->subtitle ?? old('subtitle') }}</textarea>
                    
                        @error('subtitle')
                        <span class="invalid-feedback">
                            {{$message}}
                        </span>
                        @enderror
                    </center>
                </div>

                
                <div class="form-group ">
                    <center> <label for="categorie"><strong>Catégorie</strong></label> 

                        <select name="categorie" id="categorie" class="form-control @error('categorie') is-invalid @enderror">
                            <option value="{{$idea->categorie->id}}" > {{$idea->categorie->name ?? old('categorie') }} </option>
                            @foreach ($categories as $categorie)
                                @if ($categorie->name != $idea->categorie->name  )
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
                    <center> <label for="content"><strong>Description</strong></label> 
                        <textarea name="content" class="form-control rounded-0 @error('content') is-invalid @enderror" id="content" cols="20" rows="8">{{$idea->content ?? old('content') }}</textarea>
                    
                        @error('content')
                        <span class="invalid-feedback">
                            {{$message}}
                        </span>
                        @enderror
                    </center>
                </div>  

                <div class="d-flex justify-content-center">
                    <button type="submit" class="btn btn-outline-primary shadow-sm ">SOUMETTRE L'IDEE</button>
                </div>
            </form>
        </div>
    </div>
@endsection