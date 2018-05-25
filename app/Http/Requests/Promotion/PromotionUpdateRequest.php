<?php

namespace App\Http\Requests\Promotion;

use Illuminate\Foundation\Http\FormRequest;

class PromotionUpdateRequest extends FormRequest
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
            'product_id' => 'required|numeric|max:4294967295|exists:products,id|unique:promotions,product_id,' . $this->promotion,
            'price' => 'required|numeric|max:4294967295',
            'start' => 'required|date_format:Y-m-d',
            'end' => 'required|date_format:Y-m-d|after_or_equal:start',
        ];
    }
}
