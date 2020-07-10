<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Idea;

class VoteIdeaController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function store(Idea $idea, Request $request)
    {
        $vote = (int) $request->vote;
        
        auth()->user()->voteI($idea,$vote);

        return back();
    }

    public function destroy(Idea $idea, Request $request)
    {    
        auth()->user()->voteIdeas()->detach($idea);

        return back();
    }

}
