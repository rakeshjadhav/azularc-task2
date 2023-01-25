<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateEmployeeRequest extends FormRequest
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
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            'name' => 'required|regex:/^[a-zA-Z ]+$/u',
            'age' => 'required|regex:/^[0-9]+$/u',
            'email' => 'required|email',
            'date_of_birth' => 'required',
            'address' => 'max:300',
            'photo' => 'mimes:jpg,jpeg,bmp,png',
        ];
    }
}
