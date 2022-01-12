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
            'name' => 'required|min:5',
            'original_price' => 'required|min:1',
            'sale' => 'required',
            'category_id' => 'required',
        ];
    }

    public function messages()
    {
        return [
            'name.required' => 'El nombre es obligatorio.',
            'name.min' => 'El nombre debe tener como mínimo 5 caracteres.',
            'original_price.required' => 'El precio original es obligatorio.',
            'original_price.min' => 'El precio original debe ser como mínimo 1.',
            'sale.required' => 'El sale es obligatorio.',
            'category_id.required' => 'La categoria es obligatoria.'
        ];
    }
}
