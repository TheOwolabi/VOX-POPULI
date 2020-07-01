<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use App\User;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Support\Facades\Hash;
use App\Models\Metier;
use App\Models\Commune;
use App\Traits\RegisteringValidation;

use Illuminate\Support\Facades\Auth;



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
    protected $redirectTo = RouteServiceProvider::HOME;

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
