<?php

namespace App\Http\Controllers;

use App\Models\Idea;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    
    public function stats()
    {
       $ideas = Idea::all()->reverse();
 
       return view('admin.ideas',compact('ideas'));
    }

    public function status(Idea $idea, Request $request)
    {
        $idea->update([
            'status' => $request->status,
        ]);

        return back();
    }
}
