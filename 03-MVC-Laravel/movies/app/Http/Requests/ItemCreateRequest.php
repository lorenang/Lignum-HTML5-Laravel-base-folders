<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ItemCreateRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    /*Dentro del método authorize() le estoy retornando true para permitir el ingreso de datos a mi aplicación, si le coloca false, el sistema no te permitirá ingresar datos a la aplicación: */
    public function authorize()
    {
        return true;
    }
 
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, mixed>
     */
    public function rules()
    /*en el método rules() hago la  validación de los datos que se envian a la Base de Datos, el primer caso es para el nombre, le digo que es un campo obligatorio (required) y que debe ser único en la tabla productos, es decir no debe haber otro registro con ese nombre y solo le permitiré un máximo de 255 caracteres al nombre del registro, debajo a los demas valores le indico que son datos obligatorios (required): */
    {
        return [
            'year' => 'required',
            'title' => 'required|unique:peliculas|max:255',
            'time' => 'required',
            'sinopsis' => 'required|max:255',
        ];
    }
}
