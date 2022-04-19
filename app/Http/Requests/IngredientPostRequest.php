<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class IngredientPostRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return auth()->check();
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'name' => 'required|string|max:255',
            'description' => 'nullable|string|max:255',
            'serving_name' => 'nullable|string|max:255',
            'serving_grams' => 'required|numeric|gte:0',
            'calories' => 'required|numeric|gte:0',
            'carbohydrates' => 'required|numeric|gte:0',
            'fat' => 'required|numeric|gte:0',
            'protein' => 'required|numeric|gte:0',
            'fiber' => 'nullable|numeric|gte:0',
            'sugar' => 'nullable|numeric|gte:0',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,svg,webp|max:2048',
        ];
    }
}
