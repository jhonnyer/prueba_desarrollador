<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class VehiculoFormRequest extends FormRequest
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
        // Reglas de verificacion 
        return [
            'id_propietario1'=>'required',
            'placa'=>'required|max:10',
            'marca'=>'required|max:30',
            'tipo_vehiculo'=>'required|max:40',
            //
        ];
    }
}
