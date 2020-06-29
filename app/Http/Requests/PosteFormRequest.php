<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class PosteFormRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'intitule' => 'required',
            'fiche' => 'required',
            'mandat' => 'required|numeric|between:1,5',

        ];
    }

    public function messages()
    {
        return [
            'intitule.required' => 'Présentez brièvement le poste à créer',
            'fiche.required' => "Merci d'indiquer les missions assignées à ce poste de responsabilités",
            'mandat.required' => "Indiquez une valeur entre 1 et 5",
            'mandat.between' => "1 à 5 ans maximum",
        ];
    }
}
