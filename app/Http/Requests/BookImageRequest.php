<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class BookImageRequest extends FormRequest
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
            'book_id' => 'required|uuid|exists:books,id',
            'image_url' => 'required|string|max:255',
            'image_order' => 'nullable|integer|min:1'
        ];
    }

    public function messages(): array
    {
        return [
            'book_id.required' => 'The book_id field is required.',
            'book_id.uuid' => 'The book_id field must be a valid UUID.',
            'book_id.exists' => 'The book_id field does not exist.',
            'image_url.required' => 'The image_url field is required.',
            'image_url.string' => 'The image_url field must be a string.',
            'image_url.max' => 'The image_url field must not exceed 255 characters.',
            'image_order.integer' => 'The image_order field must be an integer.',
            'image_order.min' => 'The image_order field must be at least 1.',
        ];
    }
}
