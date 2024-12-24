<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class SeriesFormRequest extends FormRequest
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
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            'name'=> 'required|string|min:3|max:120',
        ];
    }

    public function messages(){
        return [
            'name.required' => 'O nome é obrigatório.',
            'name.min'=> 'O nome tem de ter no minimo :min caracteres',
            'name.max' =>'O nome não pode ter mais de :max caracteres',
        ];
    }
}
