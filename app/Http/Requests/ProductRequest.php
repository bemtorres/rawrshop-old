<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ProductRequest extends FormRequest
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
            'code' => 'required',
            'name' => 'required|min:2|max:100',
            'description' => 'required|min:4|max:150',
            'images' => 'min:1|max:10',
            'config' => 'required',
            'price' => 'min:0|max:10',
            'discount_price' => 'min:0|max:10',
            'tittle' => 'min:1|max:10',
            'category_id' => 'required|min:1|max:10',
            'stock' => 'required|min:1|max:10',
            'critical_stock' => 'required|min:1|max:10',
            'user_id'=> 'required',
        ];
    }
}
