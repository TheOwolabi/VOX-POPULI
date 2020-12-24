<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Idea;

class RootPagesController extends Controller
{
   public function index()
   {
      $ideas = Idea::all()->reverse();

      return view('root.acceuil');
   }
}
