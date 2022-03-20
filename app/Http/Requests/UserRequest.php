<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UserRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return false;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'email' => 'required|min:4|max:100|email|unique:',
            'password' => 'required|min:4|max:100',
            'name' => 'required|min:2|max:100',
            'admin' => 'nullable|max:50',
            'super' => 'nullable|max:50',
            'active' => 'nullable|max:50',
        ];
    }
}
