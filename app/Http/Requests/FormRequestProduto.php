<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class FormRequestProduto extends FormRequest
{
    
    public function authorize(): bool
    {
        return true;
    }

   
    //pesquisar sobre as rules
     
    public function rules(): array
    {
        $request = [];
        if($this->method() == "POST"){
            $request = [
                'nome'          => 'required', 
                'descricao'     => 'required',
                'valor'         => 'required'
            ];
        }
        return $request;
    }
}
