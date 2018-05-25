<?php

namespace App\Http\Requests\Product;

use Illuminate\Foundation\Http\FormRequest;

class ProductUpdateRequest extends FormRequest
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
            'category_id' => 'required|numeric|max:4294967295|exists:categories,id',
            'name' => 'required|max:255|unique:products,name,' . $this->product,
            'img' => 'max:255',
            'quantity' => 'required|numeric|max:4294967295',
            'price' => 'required|numeric|max:4294967295',
            'packet' => 'required|max:255',
            'summary' => 'required|max:255',
            'description' => 'required',
        ];
    }
}
