<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class RoleRequest extends FormRequest
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
            'name' => ['required', 'min:1', 'max:50', "unique:roles,name,$this->id,id"],
             'description' => ['required', 'min:1', 'max:50']
        ];
    }
    public function messages()
    {
            return [
                'required'=>'bắt buộc phải nhập',
                'min'=> ":attribute phải lớn hơn :min",
                'max'=>":attribute phải nhỏ hơn :max",
                'unique' => ":attribute đã tồn tại"
            ];
    }
    public function attributes()
    {
        return [
            'name' => "Role name",
            'description'=> 'Mô tả'
        ];
    }
}
