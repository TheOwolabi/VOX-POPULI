<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Idea;

class VoteController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function __invoke(Idea $idea, Request $request)
    {
        $vote = (int) $request->vote;
        
        auth()->user()->voteI($idea,$vote);

        return back();
    }
}
