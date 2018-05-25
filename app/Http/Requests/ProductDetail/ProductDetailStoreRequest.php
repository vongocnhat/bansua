<?php

namespace App\Http\Requests\ProductDetail;

use Illuminate\Foundation\Http\FormRequest;

class ProductDetailStoreRequest extends FormRequest
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
            'product_id' => 'required|numeric|max:4294967295|exists:products,id',
            'name' => 'required|max:255|unique:product_details,name,NULL,NULL,product_id,' . $this->product_id,
            'value' => 'required|numeric|max:9999999.9',
            'unit' => 'required|max:255',
        ];
    }
}
