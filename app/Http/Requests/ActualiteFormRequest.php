<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ActualiteFormRequest extends FormRequest
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
            'title' => 'required',
            'description' => 'required',
            'categorie' => 'required',
        ];
    }

    public function messages()
    {
        return [
            'title.required' => 'Précisez le titre de l\'actualité',
            'categorie.required' => 'A quoi se rapporte l\'actualité ? ',
            'description.required' => 'Veuillez rédiger l\'actualité',
        ];
    }
}
