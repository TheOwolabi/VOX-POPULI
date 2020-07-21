<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class IdeaFormRequest extends FormRequest
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
            'topic' => 'required',
            'subtitle' => 'required',
            'content' => 'required',
            'categorie' => 'required'
        ];
    }
    
    public function messages()
    {
        notify()->error('Ooops ! Il y a eu un problème ...');

        return [
            'topic.required' => 'Expliquez brièvement votre idée',
            'subtitle.required' => 'Expliquez brièvement votre idée',
            'content.required' => 'Exposez votre idée avec force de détails',
            'categorie.required' => "Merci d'indiquer dans quel cadre s'inscrit votre idée",
        ];
    }
}
