@extends('layouts.app')

@section('content')
    @empty($metiers)
       <p> 
           VOUS N'AVEZ RENSEIGNE AUCUN METIER POUR LE MOMENT 
        </p> 
    @endempty
    
    
    <div class="container-fluid">
        <div class="d-flex justify-content-center">
            <a href="{{route('metier.create')}}" class="btn btn-success">AJOUTER METIER</a>
        </div>

        @foreach ($metiers as $metier)
         <div class="col-md-8 mx-auto">
             <div class="card mt-4">
                 <div class="card-header">
                     <div class="row">
                         <div class="col-md-9 pt-2">
                            {{$metier->title}} 
                         </div>
                         <div class="col-md-3 pr-1">
                            <div class="float-right">
                                <a href="{{route('metier.edit',$metier->id)}}" class=" btn btn-outline-primary"> Edit</a>
                            
                                <form style="display: inline-block;" action="{{route('metier.destroy', $metier->id)}}" method="POST">
                                    @method('DELETE')
                                    @csrf
                                    <input type="submit" class="btn btn-outline-danger" value="Delete">
                                </form>
                            </div>
                         </div>
                     </div>
                 </div>

                 <div class="card-body">
                    {{$metier->description ?? '-'}}
                 </div>
             </div>
            
        </div>
     @endforeach
    </div> 
@endsection