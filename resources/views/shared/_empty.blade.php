<div class="d-flex justify-content-center">
    <div class="jumbotron">
        <h1 class="display-4">Désolé</h1>
        <p class="lead">Nous constatons avec regret qu'{{$msg}}. Nous vous invitons fortement à commencer tout de suite. </p>
        <hr class="my-4">
        <p class="lead d-flex justify-content-center">
            @if ($model == 'idea')
             <a href="{{route('home')}}" class="btn btn-success">AJOUTER {{$btn}}</a>    
            @else
            <a href="/{{$model}}/create" class="btn btn-success">AJOUTER {{$btn}}</a>  
            @endif
        </p>
    </div>
</div>
