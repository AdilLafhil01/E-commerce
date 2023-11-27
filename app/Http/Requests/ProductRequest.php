<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ProductRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        $rules = [
            'name' => 'required|min:5',
            'description' => 'required|min:5',
            'quantity' => 'required|numeric',
            'price' => 'required|numeric',
            'category_id'=>'required|numeric',
            'image'=> 'image|mimes:png,jpg',
        ];

        // Add image validation only for the 'store' method


        return $rules;
    }

}
