<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ClienteRequest extends FormRequest
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
          'nombre'=>'required | min:4 | max:20 | unique:clientes',
          'apellido'=>'required | min:4 | max:20 | unique:clientes',
          'direccion'=>'required | min:10 | max:20 | unique:clientes',
          'telefono'=>'required | size:9 | unique:clientes',
          'dui'=> 'required | size:10 | unique:clientes',
        ];
    }
    public function messages(){

      return [
        'nombre.required'=>'El campo nombre es obligatorio',
        'nombre.min'=>'El nombre debe tener minimo 4 caracteres',
        'nombre.max'=>'El nombre debe tener máximo 20 caracteres',
        'nombre.unique'=>'El nombre ya ha sido registrado',

        'apellido.required'=>'El campo apellido es obligatorio',
        'apellido.min'=>'El apellido debe tener minimo 4 caracteres',
        'apellido.max'=>'El apellido debe tener máximo 20 caracteres',
        'apellido.unique'=>'El apellido ya ha sido registrado',

        'direccion.required'=>'El campo dirección es obligatorio',
        'direccion.min'=>'La dirección debe tener minimo 10 caracteres',
        'direccion.max'=>'La dirección debe tener maximo 20 caracteres',
        'direccion.unique'=>'La dirección ya ha sido registrado',

        'telefono.required'=>'El campo teléfono es obligatorio',
        'telefono.size'=>'El campo teléfono debe tener 9 caracteres',
        'telefono.unique'=>'El campo teléfono ya ha sido registrado',

        'dui.size'=>'El campo DUI debe tener 10 caracteres',
        'dui.unique'=>'El campo DUI ya ha sido registrado',

      ];
    }
}
