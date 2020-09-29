<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CategoriaFormRequest extends FormRequest
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
		 // Regras de Validação de Categoria
        return [           
            'nome' => 'required|min:3|max:60'
        ];
    }
    
    /**
     * Contem as mensagens customizadas para Categoria
     *
     * @return array
     */
    public function messages(){
		return [
            'required' => 'O campo :attribute é obrigatório',
            'nome.min' => 'O campo nome precisa ter ao menos 3 caracteres',
            'nome.max' => 'O campo nome precisa ter no máximo 60 caracteres'
        ];
	}
    
}
