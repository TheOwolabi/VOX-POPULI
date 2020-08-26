<?php

namespace App\Http\Controllers;

use Auth;
use Illuminate\Http\Request;
use Nexmo\Laravel\Facade\Nexmo;
use Illuminate\Support\Facades\DB;

class NexmoController extends Controller
{
   public function show()
   {
       return view('vonage');
   }

   public function verify(Request $request)
   {
       $this->validate([
           'code' => 'size:4'
       ]);

       $request_id = session('nexmo_request_id');
       $verification = new \Nexmo\Verify\Verification($request_id); 

       Nexmo::verify()->check($verification, $request->code);

       $date = date_create();

       DB::table('users')->where('id', Auth::id())->update(['tel_verified_at' => date_format($date, 'Y-m-d H:i:s')]);
       return redirect('/home');
   }
}
