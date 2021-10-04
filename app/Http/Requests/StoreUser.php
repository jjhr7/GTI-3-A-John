<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreUser extends FormRequest
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
            'name' => 'required',
            'email' => 'required|email|unique:users,email, '.((auth()->user())? auth()->user()->id : ''),
            'password' => 'required|min:6|confirmed',
            'role_id' => 'required'

        ];
    }

    public function attributes()
    {
        return [
            'name' => 'Nombre',
            'password' => 'Contraseña',
            'email' => 'Email'
        ];
    }
}
