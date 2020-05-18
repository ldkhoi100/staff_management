<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ChucvuRequest extends FormRequest
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
            'Ten_CV' => 'required |string | min:2 | max:15 | regex:/\D/ | unique:chuc_vu,Ten_CV,'.$this->id,'id',
            'Cong_Viec' => 'required | string |min:2 | max:15 | regex:/\D/ ',
        ];
    }

    public function messages()
    {
        $messages = [
            'Ten_CV.unique' => 'Nhập trùng rồi bố',
            'Ten_CV.required' => 'Nhập đi bố',
            'Ten_CV.min' => 'Nhập ngắn thế bố',
            'Ten_CV.max' => 'Nhập dài thế bố',
            'Ten_CV.regex' => 'Không được nhập số',
            'Cong_Viec.required' => 'Nhập đi bố',
            'Cong_Viec.min' => 'Nhập ngắn thế bố',
            'Cong_Viec.max' => 'Nhập dài thế bố',
            'Cong_Viec.regex' => 'Không được nhập số'

        ];

        return $messages;
    }
}
