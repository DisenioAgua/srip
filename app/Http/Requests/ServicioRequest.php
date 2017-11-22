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
          'nombre'=>'required | min:10 | max:20 | unique:servicios',
          'ganancia'=>'required | unique:servicios',
        ];
    }
    public function messages(){

      return [
        'nombre.required'=>'El campo Nombre es obligatorio',
        'nombre.min'=>'El Nombre debe tener mínimo 10  caracteres',
        'nombre.max'=>'El Nombre debe tener máximo 20  caracteres',
        'nombre.unique'=>'El Nombre ya ha sido registrado',

        'ganancia.required'=>'El campo ganancia es obligatorio',
        'ganancia.unique'=>'La ganancia ya ha sido registrada',

      ];
    }
}
