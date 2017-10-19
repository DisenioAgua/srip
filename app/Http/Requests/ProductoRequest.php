<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ProductoRequest extends FormRequest
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
            'nombre'=>'required | min:4 | max:20 | unique:productos',
            'codigo'=>'required | size:6 | unique:productos',
            'categoria_id'=> 'integer|required|not_in:0',
            'archivo'=> 'required|file|between:1,14000|mimes:png,jpeg,jpg',
        ];
    }
    public function messages(){

      return [
        'codigo.required'=>'El campo Código es obligatorio',
        'codigo.size'=>'El Código debe tener 6 caracteres',
        'codigo.unique'=>'Código ya ha sido registrado',

        'nombre.required'=>'El campo Nombre es obligatorio',
        'nombre.min'=>'El Nombre debe tener mínimo 4  caracteres',
        'nombre.max'=>'El Nombre debe tener máximo 20  caracteres',
        'nombre.unique'=>'El Nombre ya ha sido registrado',

        'categoria_id.not_in'=>'Seleccione una opción válida',

        'archivo.required'=> 'Debe seleccionar una imagen',
        'archivo.file'=> 'El archivo no fue subido correctamente',
        'archivo.between'=> 'El peso permitido es de 1 kb a 14000kb',
        'archivo.mimes'=> 'Tipo de archivo debe ser png, jpeg o jpg',

      ];
    }
}
