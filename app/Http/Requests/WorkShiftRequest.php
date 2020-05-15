<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class WorkShiftRequest extends FormRequest
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
            'Ca' => ['required', 'integer', 'min:1','max:100000',"unique:ca_lam,Ca,$this->id,id"],
            'He_So' => ['required', 'numeric','min:1', 'max:10'],
            'Mo_Ta' => ['required', 'string', 'min:11', 'max:6500', "unique:ca_lam,Mo_Ta,$this->id,id"]
        ];
    }

    public function attributes()
    {
        return [
            'Ca' => 'Work Shift',
            'He_So' => 'Factor',
            'Mo_Ta' => 'Description'
        ];
    }
}
