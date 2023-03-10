<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ComponenteServicioRequest extends FormRequest
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
            'id_servicios'    => 'required',
            'id_componentes'  => 'required',
        ];
    }

    public function messages()
    {
        return [
            'id_servicios.required'     => 'Se espera un servicio',
            'id_componentes.required'   => 'Se espera un componente',
        ];
    }
}
