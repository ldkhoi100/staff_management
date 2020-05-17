<?php

namespace App\Http\Requests;

use Illuminate\Contracts\Validation\Validator;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Exceptions\HttpResponseException;

class NhanVienCreateRequest extends FormRequest
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
            'MaCV' => ['required', 'numeric'],
            'He_So_Luong' => ['required', 'numeric'],
            'Anh_Dai_Dien' => ['nullable', 'image', 'mimes:png,jpg,jpeg', 'max:5000'],
            'Ho_Ten' => ['required', 'string', 'min:3', 'max:255'],
            'Ngay_Sinh' => ['required', 'date',],
            'Gioi_Tinh' => ['required', 'string', 'min:3', 'max:255'],
            'So_Dien_Thoai' => ['required', 'numeric', 'min:0',],
            'Dia_Chi' => ['required', 'string', 'min:8', 'max:255'],
            'Ngay_Bat_Dau_Lam' => ['required', 'date'],
        ];
    }
}