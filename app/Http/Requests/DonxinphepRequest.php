<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class DonxinphepRequest extends FormRequest
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
            'TieuDe' => 'required | min:5 | max:15 | regex:/\D/ |',
            'NoiDung' => 'required | min:5',
        ];
    }

    public function messages()
    {
        $meseger = [

            'MaNV.required' => 'Nhập vào đi bố',

            'TieuDe.required' => 'Nhập vào đi bố',
            'TieuDe.min' => 'Nhập ngắn thế bố',
            'TieuDe.max' => 'Nhập dài thế bố',
            'TieuDe.regex' => 'Không nhập số',

            'NoiDung.required' => 'Nhập vào đi bố',
            'NoiDung.min' => 'Nhập ngắn thế bố',


        ];

        return $meseger;


    }
}
