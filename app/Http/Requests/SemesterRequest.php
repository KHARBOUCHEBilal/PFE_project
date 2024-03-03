<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class SemesterRequest extends FormRequest
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
            "student_id" => 'required',
            "S1"=> "required|numeric|max:20|min:0",
            "S2"=> "required|numeric|max:20|min:0",
            "S3"=> "required|numeric|max:20|min:0",
            "S4"=> "required|numeric|max:20|min:0",
            "S5"=> "required|numeric|max:20|min:0",
            "S6"=> "required|numeric|max:20|min:0"
        ];
    }
}
