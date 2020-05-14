<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class BaseSalaryRequest extends FormRequest
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
            'Tien_Luong' => ['required', 'numeric', 'min:100000', 'max:10000000']
        ];
    }

    public function messages()
    {
        return [
            'required' => ':attribute chưa nhập giá trị',
            'numeric' => ':attribute phải là một số',
            'min' => ':attribute phải lớn hơn :min',
            'max' => ':attribute phải nhỏ hơn :max'
        ];
    }

    public function attributes()
    {
        return [
            'Tien_Luong' => "Tiền lương"
        ];
    }
}
