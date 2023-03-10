<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ComponenteRequest extends FormRequest
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
            'id_componentes' => 'required',
            'nombre'       => 'required',
            'serial'       => 'required',
        ];
    }

    public function messages()
    {
        return [
            'id_componentes.required'   => 'Se esperaba un ID',
            'nombre.required'   => 'Se esperaba un nombre',
            'serial.required'   => 'Se esperaba un serial',
        ];
    }
}
