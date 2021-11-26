<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreRead extends FormRequest
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
            'user_id' => ['required','numeric'],
            'device_id'=>['required','numeric'],
            'latitude'=>['required','numeric'],
            'longitude'=>['required','numeric'],
            'type_read'=> ['required'],
            'value'=>['required','nuemric'],
            'date'=>['required','numeric']
        ];
    }

    public function attributes()
    {
        return[
            'user_id' => 'Id de usuario',
            'device_id'=>'Id de dispositivo',
            'latitude'=>'Latitud',
            'longitude'=>'Longitud',
            'type_read'=> 'Tipo de medición',
            'value'=>'Valor',
            'date'=>'Fecha'
        ];
    }
}
