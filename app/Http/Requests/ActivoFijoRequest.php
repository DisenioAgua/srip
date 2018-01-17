<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ActivoFijoRequest extends FormRequest
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
          'nombre'=>'required | min:4 | max:20',
          'precio'=>'required',
          'cantidad'=>'required',
          'categoria_id'=> 'integer|required|not_in:0',
          'tipoactivo'=> 'required',
          'precioalquiler'=> 'required',
        ];
    }
    public function messages(){

      return [
        'nombre.required'=>'El campo Nombre es obligatorio',
        'nombre.min'=>'El Nombre debe tener mínimo 4  caracteres',
        'nombre.max'=>'El Nombre debe tener máximo 20  caracteres',

        'categoria_id.not_in'=>'Seleccione una opción válida',

        'precio.required'=>'El campo Nombre es obligatorio',

        'cantidad.required'=>'El campo Nombre es obligatorio',
      ];
    }
}
