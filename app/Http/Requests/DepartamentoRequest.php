<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use App\Client;

class DepartamentoRequest extends FormRequest
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
            'nombre_dpto'=>'max:120|required|unique:departamentos',
            'slug_dpto'=> 'max:120|required|unique:departamentos',
            'imagen'=>'required',
            'sitio_web'=>'required',
        ];
    }
}
