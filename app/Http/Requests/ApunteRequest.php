<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use App\Apuntes;

class ApunteRequest extends FormRequest
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
            'nombre_apunte'=>'max:120|required|unique:apuntes',
            'autores'=> 'max:190|min:10|required',
            'materia_id'=>'required',
            'archivo'=>'required',
        ];
    }
}
