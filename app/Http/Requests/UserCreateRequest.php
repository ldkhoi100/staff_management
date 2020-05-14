<?php

namespace App\Http\Requests;

use Illuminate\Contracts\Validation\Validator;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Exceptions\HttpResponseException;

class UserCreateRequest extends FormRequest
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
            'username' => ['required', 'string', 'max:255', 'unique:users', 'regex:/^[a-zA-Z0-9]{5,}$/'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users', 'regex:/^([a-z0-9\+_\-]+)(\.[a-z0-9\+_\-]+)*@([a-z\-]+\.)+[a-z]{2,6}$/ix'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
        ];
    }

    //     public function failedValidation(Validator $validator)
    //     {
    //         throw new HttpResponseException(response()->json($validator->errors(), 203));
    //     }
}