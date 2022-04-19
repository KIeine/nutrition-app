<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class MealPostRequest extends FormRequest
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
            'title' => 'required|string|min:3|max:255',
            'description' => 'required|string|max:2000',
            'type' => 'required|string|max:255',
            'ingredients' => 'required|array|max:50',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg,webp|max:2048',
            'notes' => 'nullable|array|max:50',
            'notes.*' => 'nullable|string|max:255',
            'quantities' => 'nullable|array|max:50',
            'quantities.*' => 'nullable|numeric|gte:0',
        ];
    }
}
