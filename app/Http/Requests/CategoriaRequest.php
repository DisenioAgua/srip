<?php

namespace App\Http\Requests;


use Illuminate\Foundation\Http\FormRequest;

class CategoriaRequest extends FormRequest
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
          'nombre'=>'required | min:4 | max:20 | unique:categorias',
          'descripcion'=>'required | min:10 | max:35 | unique:categorias',

      ];
    }
    public function messages(){

      return [
        'nombre.required'=>'El campo Nombre es obligatorio',
        'nombre.min'=>'El Nombre debe tener mínimo 4  caracteres',
        'nombre.max'=>'El Nombre debe tener máximo 20  caracteres',
        'nombre.unique'=>'El Nombre ya ha sido registrado',

        'descripcion.required'=>'El campo Descripción es obligatorio',
        'descripcion.min'=>'La Descripción debe tener mínimo 10  caracteres',
        'descripcion.max'=>'La Descripción debe tener máximo 35  caracteres',
        'descripcion.unique'=>'La Descripción ya ha sido registrada',

      ];
    }
}
