<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class FactorSalaryRequest extends FormRequest
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
            'He_So_Luong' => ['required', 'numeric', 'min:1', 'max:5', "unique:he_so_luong,He_So_Luong,$this->id,id"]
        ];
    }

    public function messages()
    {
        return [
            'required' => ":attribute bắt buộc phải có giá trị",
            'numeric' => ":attribute phải là một số",
            'min' => ":attribute phải lớn hơn :min",
            'max' => ":attribute phải nhỏ hơn :max",
            'unique' => ":attribute đã tồn tại"
        ];
    }

    public function attributes()
    {
        return [
            'He_So_Luong' => "Hệ số lương"
        ];
    }
}
