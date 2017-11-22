<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CategoriaActivoRequest extends FormRequest
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
          'codigo'=>'required | min:4 | max:10 | unique:categoria_activos',
          'nombre'=>'required | min:4 | max:20 | unique:categoria_activos',
        ];
    }
    public function messages(){

      return [
        'codigo.required'=>'El campo Nombre es obligatorio',
        'codigo.min'=>'El Nombre debe tener mínimo 4  caracteres',
        'codigo.max'=>'El Nombre debe tener máximo 20  caracteres',
        'codigo.unique'=>'El Nombre ya ha sido registrado',

        'nombre.required'=>'El campo Nombre es obligatorio',
        'nombre.min'=>'El Nombre debe tener mínimo 4  caracteres',
        'nombre.max'=>'El Nombre debe tener máximo 20  caracteres',
        'nombre.unique'=>'El Nombre ya ha sido registrado',

      ];
    }
}
