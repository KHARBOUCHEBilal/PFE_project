<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class ModuleRequest extends FormRequest
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
            "student" => 'required',
            "programation2"=> "required|numeric|max:20|min:0",
            "structure_de_donnees" => "required|numeric|max:20|min:0",
            "systeme_dexploitation2" => "required|numeric|max:20|min:0",
            "analyse_numerique" => "required|numeric|max:20|min:0",
            "archetecture_des_ordinateurs"=> "required|numeric|max:20|min:0",
            "electromagnetisme" => "required|numeric|max:20|min:0",
        ];
    }
}
