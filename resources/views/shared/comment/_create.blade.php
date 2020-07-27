<div class="card-body">
    <form action="{{route('idea.comment.store',$idea)}}" id="com" class="" method="POST" >  
        @csrf
            <div class="row">
                <div class="offset-md-4 col-md-4">
                    <textarea name="comment" id="comment" class="form-control @error('comment') is-invalid @enderror " cols="1" rows="3"> 
                        
                    </textarea>

                    @error('comment')
                        {{$message}}
                    @enderror
            </div>
            <div class="col my-auto">
                    <button class="d-inline btn rounded-circle btn-success"><i class="fas fa-paper-plane"></i></button>      
            </div>
        </div>
    </form>
</div>