<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class EmpleadoRequest extends FormRequest
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
          //
          'nombre'=>'required | min:4 | max:20',
          'apellido'=>'required | min:4 | max:20',
          'direccion'=>'required | min:10 | max:20',
          'telefono'=>'required | size:9 | unique:users',
          'dui'=> 'required | size:10 | unique:users',
          'name'=> 'required | size:9 | unique:users',
          'email'=> 'required | email | unique:users',
          'password'=> 'required_if:bandera,1| size:9 | confirmed',
          'acceso' => 'integer|required|not_in:0',
          'archivo'=> 'required|file|between:1,14000|mimes:png,jpeg,jpg',
      ];
    }
    public function messages(){

      return [
        'nombre.required'=>'El campo Nombre es obligatorio',
        'nombre.min'=>'El Nombre debe tener al menos 4 caracteres',
        'nombre.max'=>'El Nombre debe tener máximo 20 caracteres',

        'apellido.required'=>'El campo Apellido es obligatorio',
        'apellido.size'=>'El Apellido debe tener al menos 4 caracteres',
        'apellido.size'=>'El Apellido debe tener máximo 20 caracteres',

        'direccion.required'=>'El campo dirección es obligatorio',
        'direccion.min'=>'La dirección debe tener al menos 10 caracteres',
        'direccion.max'=>'La dirección debe tener máximo 20 caracteres',

        'telefono.required'=>'El campo Teléfono es obligatorio',
        'telefono.size'=>'El campo Teléfono debe tener 9 caracteres',
        'telefono.unique'=>'El campo Teléfono ya ha sido registrado',

        'dui.required'=>'El campo DUI es obligatorio',
        'dui.size'=>'El campo DUI debe tener 10 caracteres',
        'dui.unique'=>'El campo DUI ya ha sido registrado',

        'name.required'=>'El campo usuario es obligatorio',
        'name.size'=>'El campo usuario debe tener 9 caracteres',
        'name.unique'=>'El campo usuario ya ha sido registrado',

        'email.required'=>'El campo E-mail es obligatorio',
        'email.email'=>'El campo E-mail debe ser un correo',
        'email.unique'=>'El campo E-mail ya ha sido registrado',

        'password.required_if'=>'El campo Contraseña es obligatorio',
        'password.size'=>'El campo Contraseña debe tener 9 caracteres',
        'password.confirmed'=>'Debe confirmar Contraseña',

          'acceso.not_in'=>'Seleccione una opción válida',

          'archivo.required'=> 'Debe seleccionar una imagen',
          'archivo.file'=> 'El archivo no fue subido correctamente',
          'archivo.between'=> 'El peso permitido es de 1 kb a 14000kb',
          'archivo.mimes'=> 'Tipo de archivo debe ser png,jpeg o jpg',

      ];
    }
}
