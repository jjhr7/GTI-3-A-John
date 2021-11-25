<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreNotification extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return false;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'user_id'=>'required|numeric',
            'date'=>'required|date',
            'message'=>'required',
            'type'=>'required'
        ];
    }

    public function attributes()
    {
        return[
            'user_id'=>'ID usuario',
            'date'=>'Fecha',
            'message'=>'Mensage',
            'type'=>'Tipo'
        ];
    }
}
