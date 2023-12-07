<?php

namespace App\Http\Requests\Admin;

use Illuminate\Foundation\Http\FormRequest;

class PropertyFormRequest extends FormRequest
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
        return [
            'title' => 'required|string|max:255',
            'slug' => 'required|string|max:255|unique:properties,slug,'.$this->property,
            'description' => 'required|string',
            'surface' => 'required|integer',
            'rooms' => 'required|integer',
            'bedrooms' => 'required|integer',
            'floor' => 'required|integer',
            'price' => 'required|integer',
            'city' => 'required|string|max:255',
            'address' => 'required|string|max:255',
            'postal_code' => 'required|integer',
            'sold' => 'required|boolean',
            'options'=>['array','exists:options,id','required']
        ];
    }
}
