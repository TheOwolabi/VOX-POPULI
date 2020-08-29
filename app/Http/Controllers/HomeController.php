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
        $this->middleware(['auth','number.verified']);
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $idea = new Idea;
        $categories = Categorie::all();

        return view('home',compact(['idea','categories']));
    }
}
