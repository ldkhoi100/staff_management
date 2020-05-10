<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class FactorSalary extends FormRequest
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
            'Bac_Luong' => ['required', 'numeric', 'min:1', 'max:5', "unique:bac_luong,Bac_Luong,$this->id,id"]
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
            'Bac_Luong' => "Bậc lương"
        ];
    }
}