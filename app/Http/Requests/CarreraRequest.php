<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use App\Client;

class CarreraRequest extends FormRequest
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
            'nombre_carrera'=>'max:120|required|unique:carreras',
            'slug_carrera'=> 'max:120|required|unique:carreras',
            'departamento_id'=>'required',
            'imagen'=>'required',
            'duracion'=>'required',
            'anio_plan'=>'required',
            'estado'=>'required',
        ];
    }
}
