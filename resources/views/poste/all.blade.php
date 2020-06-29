@extends('layouts.app')

@section('content')
    @empty($postes)
       <p> 
           VOUS N'AVEZ RENSEIGNE AUCUN poste POUR LE MOMENT 
        </p> 
    @endempty
    
    
    <div class="container-fluid">
        <div class="d-flex justify-content-center">
            <a href="{{route('poste.create')}}" class="btn btn-success">AJOUTER POSTE</a>
        </div>

        @foreach ($postes as $poste)
         <div class="col-md-8 mx-auto">
             <div class="card mt-4">
                 <div class="card-header">
                     <div class="row">
                         <div class="col-md-9 pt-2">
                            {{$poste->intitule}} 
                         </div>
                         <div class="col-md-3 pr-1">
                            <div class="float-right">
                                <a href="{{route('poste.edit',$poste->id)}}" class=" btn btn-outline-warning"> Edit</a>
                            
                                <form style="display: inline-block;" action="{{route('poste.destroy', $poste->id)}}" method="POST">
                                    @method('DELETE')
                                    @csrf
                                    <input type="submit" class="btn btn-outline-danger" value="Delete">
                                </form>
                            </div>
                         </div>
                     </div>
                 </div>

                 <div class="card-body">
                    {{$poste->fiche ?? '-'}}
                 </div>
             </div>
            
        </div>
     @endforeach
    </div> 
@endsection