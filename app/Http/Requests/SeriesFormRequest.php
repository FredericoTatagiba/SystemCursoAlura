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
            'cover' => 'nullable|image|mimes:jpg,jpeg,png,gif',
        ];
    }

    public function messages(){
        return [
            'name.required' => 'O nome é obrigatório.',
            'name.min'=> 'O nome tem de ter no minimo :min caracteres',
            'name.max' =>'O nome não pode ter mais de :max caracteres',
            'cover.image' => 'O arquivo enviado deve ser uma imagem.',
            'cover.mimes' => 'A imagem deve ser do tipo: jpg, jpeg, png ou gif.',
        ];
    }
}
