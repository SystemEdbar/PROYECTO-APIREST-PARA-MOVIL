<?php

namespace App\Http\Requests\clientes;
use Illuminate\Foundation\Http\FormRequest;

class ClientesRequest extends FormRequest
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
            'cli_nombre'=>'required',
            'cli_apellido'=>'required',
            'cli_telefono'=>'required',
            'cli_email'=>'required',
            'cli_domicilio'=>'nullable',
        ];
    }
}
