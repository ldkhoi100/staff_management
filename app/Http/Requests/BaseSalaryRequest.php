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
            'Tien_Luong' => ['required', 'numeric', 'min:100000', 'max:10000000'],
            "Mo_Ta" => ['required', 'string']
        ];
    }

    public function attributes()
    {
        return [
            'Tien_Luong' => "Base Salary",
            'Mo_Ta' => "Description"
        ];
    }
}
