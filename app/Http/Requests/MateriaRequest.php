<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use App\Client;

class MateriaRequest extends FormRequest
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
            'nombre_materia'=>'max:120|required|unique:materias',
            'slug_materia'=> 'max:120|required|unique:materias',
            'carreras'=>'required',
            'semestre'=>'required',
            'tipo'=>'required',
            'anio'=>'required',
            'estado'=>'required',
        ];
    }
}
