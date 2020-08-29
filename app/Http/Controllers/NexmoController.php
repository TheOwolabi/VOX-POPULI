<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

class NexmoController extends Controller
{
    
    public function show()
    {
        return view('auth.nexmo');
    }

    public function verify(Request $request )
    {
        $this->validate($request, [
            'code' => 'size:4' 
        ]);


        $request_id = session('nexmo_request_id');
        $verification = new \Nexmo\Verify\Verification($request_id);

        $date = date_create();
        $user = auth()->user();
        
            // dd(date_format($date, 'Y-m-d H:i:s'));

            DB::table('users')->where('id', Auth::id())->update(['tel_verified_at' => date_format($date, 'Y-m-d H:i:s')]);

        // dd($user);
        return redirect('/home');
    }
}
