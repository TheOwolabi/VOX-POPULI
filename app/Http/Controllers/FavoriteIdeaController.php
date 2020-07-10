<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Idea;

class FavoriteIdeaController extends Controller
{
   public function __construct()
   {
      $this->middleware('auth');
   }

   public function store(Idea $idea)
   {
       auth()->user()->favoriteIdeas()->attach($idea);
       return back();
   }

   public function destroy(Idea $idea)
   {
       auth()->user()->favoriteIdeas()->detach($idea);
       return back();
   }
}
