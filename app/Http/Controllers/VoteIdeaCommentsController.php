<?php

namespace App\Http\Controllers;

use App\Models\Idea;
use App\Models\Comment;
use Illuminate\Http\Request;

class VoteIdeaCommentsController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
   

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, Idea $idea, Comment $comment)
    {
        $vote = (int) $request->vote;

        auth()->user()->VoteCom($comment, $vote);
      
        return back();
    }

    
    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Comment  $comment
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, Idea $idea, Comment $comment)
    {
        auth()->user()->Votecomments()->detach($comment);

        return back();

    }
}
