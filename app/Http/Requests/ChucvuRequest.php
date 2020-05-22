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
            'Ten_CV' => 'required |string | min:2 | max:15 | regex:/\D/ | unique:chuc_vu,Ten_CV,' . $this->id, 'id',
            'Cong_Viec' => 'required | string |min:2 | max:10000 | regex:/\D/ ',
        ];
    }
}