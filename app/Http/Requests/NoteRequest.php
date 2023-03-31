<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class NoteRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        // vamos apermitir que todos los usuarios puedan sealizar este tipo de peticiones 
       
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, mixed>
     */
    public function rules()
    { // en sus reglas vamos a poner que el campo  es obligatorio
        return [
            'documento'=>'required|max:225|min:3',
            'nombre'=>'nullable|max:255|min:3',
            'apellido'=>'required|max:255|min:3'
        ];
    }
}
