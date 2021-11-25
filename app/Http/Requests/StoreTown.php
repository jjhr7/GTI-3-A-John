<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreTown extends FormRequest
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
            'postal_code'=>'required|min:5|numeric',
            'name'=>'required',
            'area'=>'required|numeric',
            'altitude'=>'required|numeric'
        ];
    }

    public function attributes()
    {
        return[
          'postal_code'=> 'Código postal',
          'name'=> 'Nombre',
          'area'=> 'Área',
          'altitude'=>'Altitud'
        ];
    }
}
