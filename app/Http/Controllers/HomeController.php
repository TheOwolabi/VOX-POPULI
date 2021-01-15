<?php

namespace App\Http\Controllers;

use App\Models\Idea;
use App\Models\Categorie;
use Illuminate\Http\Request;


class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        // 'number.verified'
        $this->middleware(['auth']);
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $ideas = Idea::where('user_id',auth()->user()->id)->get()->reverse();
        $categories = Categorie::all();

        return view('home',compact(['ideas','categories']));
    }
}
