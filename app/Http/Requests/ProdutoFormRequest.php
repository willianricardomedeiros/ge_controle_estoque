<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ProdutoFormRequest extends FormRequest
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
            'nome'=>'required|min:3|max:60',
			'descricao'=>'required|min:10',
			'codCategoria'=>'required|numeric|integer',
			'quantidadeMinima'=>'required|numeric|integer'
		];
    }
    
    /**
     * Contem as mensagens customizadas para Produto
     *
     * @return array
     */
    public function messages(){
		return [
            'nome.required' => 'O campo nome é obrigatório',
            'nome.min' => 'O campo nome precisa ter ao menos 3 caracteres',
            'nome.max' => 'O campo nome precisa ter no máximo 60 caracteres',
            'descricao.required' => 'O campo descricao é obrigatório',
            'descricao.min' => 'O campo descricao precisa ter ao menos 10 caracteres',
            'codCategoria.required' => 'O campo categoria é obrigatório',
            'codCategoria.numeric' => 'O campo categoria deve ser um número',
            'codCategoria.integer' => 'O campo categoria deve ser um número inteiro',
            'quantidadeMinima.required' => 'O campo quantidade mínoma é obrigatório',
            'quantidadeMinima.numeric' => 'O campo quantidade mínima deve ser um número',
            'quantidadeMinima.integer' => 'O campo quantidade mímima deve ser um número inteiro'
        ];
	}
}
