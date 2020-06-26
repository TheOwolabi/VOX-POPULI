<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class RootPagesController extends Controller
{
   public function index()
   {
        return view('root.welcome');
   }
}
