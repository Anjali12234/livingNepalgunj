<?php

namespace App\Http\Requests\PropertyList;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class UpdateProperyListRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }


    public function rules(): array
    {
        return [
            'title' => ['required','string'],
            'rate' => ['required','string'],
            'description' => ['required','string'],
            'address' => ['required','string'],
            'is_rent' => ['required'],
            'map_url' => ['required'],
            'bed_room' => ['nullable','numeric'],
            'bathroom' => ['nullable','numeric'],
            'internet' => ['nullable','string'],
            'parking' => ['nullable','string'],
            'area' => ['required','string'],
            'kitchen_type' => ['nullable','string'],
            'deposit' => ['required','string'],
            'slug' => [
                'nullable',
                'string',
                Rule::unique('property_lists', 'slug')->ignore($this->propertyList)
            ],

            'files' => ['nullable', 'array'],
            'files.*' => ['mimes:png,jpg,jpeg,jfif,webp'],
        ];
    }
}
