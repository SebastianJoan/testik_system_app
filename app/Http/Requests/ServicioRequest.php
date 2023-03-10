<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ServicioRequest extends FormRequest
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
            'id_servicios'  => 'required','unique:servicios',
            'id_clientes'   => 'required',
            'lugar'         => 'required',
        ];
    }

    public function messages()
    {
        return [
            'id_clientes.required'  => 'Se esperaba un cliente',
            'id_servicios.required' => 'Se esperaba un identificador para el servicio',
            'id_servicios.unique'   => 'Ya existe un servicio con este identificador',
            'lugar.required'        => 'Se espera un lugar',
        ];
    }
}
