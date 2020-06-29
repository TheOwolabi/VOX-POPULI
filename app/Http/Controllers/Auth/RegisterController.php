<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use App\User;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use App\Models\Metier;
use App\Models\Commune;

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
    protected function validator(array $data)
    {
        $messages = [
            'tel.digits'    => "Indiquez l'indicatif de votre pays suivi des 8 chiffres de votre numéro de téléphone (sans aucun espace)",
            'title.required'    => "Précisez l'intitulé de votre métier",
            'password.min' => 'Votre mot de passe doit contenir au moins 8 caractères',
            'password.confirmed' => 'Les deux mots de passe ne sont pas identiques'
        ];

        if(!empty($data['descr']))
        {
           return Validator::make($data, [
                'name' => ['required', 'string', 'max:255'],
                'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
                'tel' => ['required','digits:11'],
                'title' => ['required'],
                'password' => ['required', 'string', 'min:8', 'confirmed'],
           ], $messages); 
        }

        return Validator::make($data, [
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'tel' => ['required','digits:11'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
        ], $messages);
    }

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
    
        if(!empty($data['descr']))
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
