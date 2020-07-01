<div class="d-flex justify-content-center">
    <div class="jumbotron">
        <h1 class="display-4">Désolé</h1>
        <p class="lead">Nous constatons avec regret qu'aucun {{$model}} n'a pour le moment été nommé. Nous vous invitons fortement à commencer tout de suite. </p>
        <hr class="my-4">
        <p class="lead d-flex justify-content-center">
            <a href="/{{$model}}/create" class="btn btn-success">AJOUTER UN {{strtoupper($model)}}</a>
            
        </p>
    </div>
</div>