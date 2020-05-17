<?php

namespace App\Http\Requests;

use Illuminate\Contracts\Validation\Validator;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Exceptions\HttpResponseException;

class NhanVienUpdateRequest extends FormRequest
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
            'MaCV' => ['required', 'numeric'],
            'He_So_Luong' => ['required', 'numeric'],
            'Anh_Dai_Dien' => ['nullable', 'image', 'mimes:png,jpg,jpeg', 'max:5000'],
            'Ho_Ten' => ['required', 'string', 'min:3', 'max:255'],
            'Ngay_Sinh' => ['required', 'date',],
            'Gioi_Tinh' => ['required', 'string', 'min:3', 'max:255'],
            'So_Dien_Thoai' => ['required', 'numeric', 'min:0',],
            'Dia_Chi' => ['required', 'string', 'min:8', 'max:255'],
            'Ngay_Bat_Dau_Lam' => ['required', 'date'],
            'Ngay_Nghi_Viec' => ['nullable', 'date'],
        ];
    }
}