<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class MarketplaceRequest extends FormRequest
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
            'name' => 'required|string|max:255|unique:marketplaces,name',
            'image_url' => 'nullable|string|max:255'
        ];
    }

    public function messages(): array
    {
        return [
            'name.required' => 'The name field is required.',
            'image_url.url' => 'The image_url field must be a valid URL.',
            'name.unique' => 'The marketplace name has already been registered.',
            'image_url.max' => 'The image URL must not exceed 255 characters.'
        ];
    }
}
