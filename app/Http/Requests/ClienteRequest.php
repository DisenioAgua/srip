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
        'nombre.required'=>'El campo Nombre es obligatorio',
        'nombre.min'=>'El Nombre debe tener minimo 4 caracteres',
        'nombre.max'=>'El Nombre debe tener máximo 20 caracteres',
        'nombre.unique'=>'Nombre ya ha sido registrado',

        'apellido.required'=>'El campo Apellido es obligatorio',
        'apellido.min'=>'El Apellido debe tener minimo 4 caracteres',
        'apellido.max'=>'El Apellido debe tener máximo 20 caracteres',
        'apellido.unique'=>'Apellido ya ha sido registrado',

        'direccion.required'=>'El campo dirección es obligatorio',
        'direccion.min'=>'La dirección debe tener minimo 10 caracteres',
        'direccion.max'=>'La dirección debe tener maximo 20 caracteres',
        'direccion.unique'=>'La dirección ya ha sido registrado',

        'telefono.required'=>'El campo Teléfono es obligatorio',
        'telefono.size'=>'El campo Teléfono debe tener 9 caracteres',
        'telefono.unique'=>'El campo Teléfono ya ha sido registrado',

        'dui.size'=>'El campo DUI debe tener 10 caracteres',
        'dui.unique'=>'El campo DUI ya ha sido registrado',

      ];
    }
}
