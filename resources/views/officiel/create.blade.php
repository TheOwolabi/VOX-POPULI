@extends('layouts.app')

@section('content')
   <div class="container-fluid">
       <div class="container-fluid">
            <table class="table table-bordered  table-striped shadow-sm ">
                <thead>
                <tr>
                    {{-- <th scope="col"></th> --}}
                    <th style="height: 20.273px; width:465.636px ;" scope="col"><center> Citoyens </center></th>
                    <th style="height: 20.273px; width:296.909px ;" scope="col"><center>Communes</center></th>
                    <th scope="col"><center>Postes disponibles</center></th>
                </tr>
                </thead>
                @foreach ($users as $user)
                <tbody>
                    <tr>
                        {{-- <th scope="row"></th> --}}
                        <td><center>{{$user->name}}</center></td>
                        <td><center>{{$user->commune->name}}</center></td>
                        <td>
                        <center>
                            
                            @foreach ($postes as $poste)
                            @php
                                $t = $user->id.'-'.$poste->id;
                            @endphp
                        <a href="#" onclick="event.preventDefault(); {{$user->state($t)}} document.getElementById('poste-{{$user->id}}-{{$poste->id}}').submit();" class="badge p-2 {{$user->style($poste->id,$t)}}">{{$poste->intitule}}</a>   
                                <form action="{{route('officiel.store')}}" id="poste-{{$user->id}}-{{$poste->id}}" method="POST" style="display: none;">
                                    @csrf
                                    <input type="text" name="user" value="{{$user->id}}">
                                    <input type="text" name="commune" value="{{$user->commune_id}}">
                                    <input type="text" name="poste" value="{{$poste->id}}">
                                    <input type="text" name="traker" value="{{$user->id}}-{{$poste->id}}">

                                </form>
                            @endforeach
                            </center>
                        </td>
                    </tr>
                <tbody>
                @endforeach 
            </table>
         </div>
   </div>
@endsection