<div class="container card-body">
    <form action="{{route('idea.comment.store',$idea)}}" id="com" class="" method="POST" >  
        @csrf
                <div class="offset-md-2 col-md-8">
                    <textarea name="comment" id="comment" class="form-control @error('comment') is-invalid @enderror " cols="1" rows="3"> 
                        
                    </textarea>

                    @error('comment')
                        {{$message}}
                    @enderror
            </div>
            <div class="d-flex justify-content-center">
                    <button class="d-inline btn btn-dark"><i class="fas fa-paper-plane"></i> Commenter</button>      
            </div>
    </form>
</div>