@extends('layouts.app')

@section('content')
<div class="container">
    <div class="d-flex justify-content-center">
        <a class="btn btn-success" data-toggle="collapse" href="#collapseExample" role="button" aria-expanded="false" aria-controls="collapseExample">
            PROPOSER UNE IDEE
        </a>
    </div>
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="">
                @include('idea.create')
            </div>
        </div>
    </div>
</div>
@endsection
