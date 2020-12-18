<?php

namespace App\Http\Controllers\Auth;

use App\User;
use App\Models\Metier;
use App\Models\Commune;
use Nexmo\Laravel\Facade\Nexmo;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Traits\RegisteringValidation;

use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\RegistersUsers;



class RegisterController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Register Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users as well as their
    | validation and creation. By default this controller uses a trait to
    | provide this functionality without requiring any additional code.
    |
    */

    use RegistersUsers;

    /**
     * Where to redirect users after registration.
     *
     * @var string
     */
    protected $redirectTo = '/home';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest');
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
        use RegisteringValidation;
    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\User
     */
    protected function create(array $data)
    {
        // $verification = Nexmo::verify()->start([
        //     'number' => $data['tel'],
        //     'brand' => 'VOX-POPULI'
        // ]);

        // session(['nexmo_request_id' => $verification->getRequestId()]);

       $user = User::create([
            'name' => $data['name'],
            'email' => $data['email'],
            'tel' => $data['tel'],
            'password' => Hash::make($data['password']),
        ]);
    
        if((!empty($data['title'])) || (!empty($data['descr'])))
        {
            $metier = Metier::create([
                'title' => $data['title'],
                'description' => $data['descr'],
                'user_id' => $user->id
            ]);
            
            $user->setMetierId($metier);
        }

        if(!Commune::where('name',$data['commune'])->exists())
        {
            $commune = Commune::create([
                'name' => $data['commune'],
            ]);
        
            $user->setCommuneId($commune);
        }
        else 
        {
            $commune = Commune::where('name',$data['commune'])->first();
            $user->setCommuneId($commune);
        }
    
       return $user;
       
    }
}
