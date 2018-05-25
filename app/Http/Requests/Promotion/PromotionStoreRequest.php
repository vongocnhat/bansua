<?php

namespace App\Http\Requests\Promotion;

use Illuminate\Foundation\Http\FormRequest;

class PromotionStoreRequest extends FormRequest
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
            'product_id' => 'required|numeric|max:4294967295|exists:products,id|unique:promotions',
            'price' => 'required|numeric|max:4294967295',
            'start' => 'required|date_format:Y-m-d|after_or_equal:today',
            'end' => 'required|date_format:Y-m-d|after_or_equal:start',
        ];
    }
}
