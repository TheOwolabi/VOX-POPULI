<?php

namespace App\Traits;
use Illuminate\Support\Facades\Validator;


trait RegisteringValidation
{
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

}
