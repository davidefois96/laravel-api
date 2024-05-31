<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ProjectRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'name'=>'required|min:3|max:100',
            'description'=>'required|min:5'


        ];
    }
    public function messages(): array
    {
        return [
            'name.required'=>'il nome è obbligatorio',
            'name.min'=>'il nome deve avere almeno :min caratteri',
            'name.max'=>'il nome non può avere più di :max caratteri',
            'description.required'=>'La descrizione è obbligatoria',
            'description.min'=>'la descrizione deve avere almeno :min caratteri'



        ];
    }
}
