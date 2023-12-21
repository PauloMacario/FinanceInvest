<?php

namespace App\Http\Requests\Api;

use Illuminate\Foundation\Http\FormRequest;

class RecipeRequest extends FormRequest
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
            'category_id' => 'required|integer',
            'image_id' => 'required|integer',
            'name' => 'required|string|min:3',
            'ingredients' => 'required|string|min:3',
            'preparation_method' => 'required|string|min:3',
        ];
    }
}
