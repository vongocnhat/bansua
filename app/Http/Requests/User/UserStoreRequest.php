<?php

namespace App\Http\Requests\User;

use Illuminate\Foundation\Http\FormRequest;

class UserStoreRequest extends FormRequest
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
            'name' => 'required|max:255',
            'email' => 'required|email|max:191|unique:users',
            'password' => 'required|max:255',
            'phone' => 'required|numeric|digits_between:1,20|unique:users',
            'birthday' => 'required|date_format:Y-m-d|before_or_equal:today',
            'gender' => 'required|boolean',
            'city' => 'required|max:255',
            'country' => 'required|max:255',
            'address' => 'required|max:255',
            'active' => 'required|boolean',
        ];
    }
}
