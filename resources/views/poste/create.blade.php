@extends('layouts.app')


@section('content')
   <div class="container-fluid">
        <div class="col-md-6 mx-auto mt-4 bg-light shadow-sm p-4">
            <form action="{{route('poste.store')}}" method="post">  
                @csrf
                <div class="form-group row mt-3">   
                    <div class="col-md-5">
                        <label for="intitule">Intitulé du poste</label>
                        <input type="text" class="form-control @error('intitule') is-invalid @enderror" name="intitule" id="intitule" value="{{$poste->intitule ?? old('intitule') }}">
                    
                        @error('intitule')
                            <span class="invalid-feedback">
                                {{$message}}
                            </span>
                        @enderror
                    </div>
                    
                    <div class="offset-md-2 col-md-5">
                        <label for="mandat">Durée du mandat (en années)</label>
                        <input type="number" class="form-control @error('mandat') is-invalid @enderror" name="mandat" id="mandat" value="{{$poste->mandat ?? old('mandat') }}">
                       
                        @error('mandat')
                            <span class="invalid-feedback">
                                {{$message}}
                            </span>
                        @enderror
                    </div>
                </div>
                                
                <div class="form-group">
                    <label for="fiche">Fiche de poste</label>

                    <textarea name="fiche" class="form-control @error('fiche') is-invalid @enderror" id="fiche" cols="20" rows="8">{{$poste->fiche ?? old('fiche') }}</textarea>
                
                    @error('fiche')
                        <span class="invalid-feedback">
                            {{$message}}
                        </span>
                    @enderror
                </div>  

                <div class="d-flex justify-content-center">
                    <button type="submit" class="btn btn-outline-primary shadow-sm ">AJOUTER CE POSTE</button>
                </div>
            </form>
        </div>
   </div>
@endsection