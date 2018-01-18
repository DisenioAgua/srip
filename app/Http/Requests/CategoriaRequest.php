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
        'nombre.required'=>'El campo nombre es obligatorio',
        'nombre.min'=>'El nombre debe tener mínimo 4  caracteres',
        'nombre.max'=>'El nombre debe tener máximo 20  caracteres',
        'nombre.unique'=>'El nombre ya ha sido registrado',

        'descripcion.required'=>'El campo descripción es obligatorio',
        'descripcion.min'=>'La descripción debe tener mínimo 10  caracteres',
        'descripcion.max'=>'La descripción debe tener máximo 35  caracteres',
        'descripcion.unique'=>'La descripción ya ha sido registrada',

      ];
    }
}
