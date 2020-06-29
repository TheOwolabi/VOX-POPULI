@extends('layouts.app')


@section('content')
   <div class="container-fluid">
        <div class="col-md-6 mx-auto mt-4 bg-light shadow-sm p-4">
            <form action="{{route('poste.update', $poste->id)}}" method="post">
                @method('PUT')    
                @csrf

                <div class="form-group  mt-3">
                    <div class="offset-md-3 col-md-5">
                       <center> <label for="intitule">Intitulé du poste</label></center>
                        <input type="text" class="form-control @error('intitule') is-invalid @enderror" name="intitule" id="intitule" value="{{$poste->intitule ?? old('intitule') }}">
                    
                        @error('intitule')
                            <span class="invalid-feedback">
                                {{$message}}
                            </span>
                        @enderror
                    </div>

                    <div class="offset-md-3 mt-3 col-md-5">
                        <center><label for="mandat">Durée du mandat (en années)</label></center>
                        <input type="number" class="form-control mx-auto col-md-3 @error('mandat') is-invalid @enderror" name="mandat" id="mandat" value="{{$poste->mandat ?? old('mandat') }}">
                       
                        @error('mandat')
                            <span class="invalid-feedback">
                                {{$message}}
                            </span>
                        @enderror
                    </div>
                </div>
                                
                <div class="form-group">
                     <label class="offset-md-4" for="fiche"> <span class="ml-4"> Fiche de poste</span> </label>

                    <textarea name="fiche" class="form-control" id="fiche" cols="20" rows="8">{{$poste->fiche ?? old('fiche') }}</textarea>
                </div>  

                <div class="d-flex justify-content-center">
                    <button type="submit" class="btn btn-outline-warning shadow-sm ">Modifier ce poste</button>
                </div>
            </form>
        </div>
   </div>
@endsection