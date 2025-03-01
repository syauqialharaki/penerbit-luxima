<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class PurchaseRequest extends FormRequest
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
            'marketplaces_id' => 'required|uuid|exists:marketplaces,id',
            'link_url' => 'required|string',
            'order' => 'nullable|integer|min:1'
        ];
    }

    public function messages(): array
    {
        return [
            'book_id.required' => 'The book_id field is required.',
            'book_id.uuid' => 'The book_id field must be a valid UUID.',
            'book_id.exists' => 'The book_id field does not exist.',
            'marketplace_id.required' => 'The marketplace_id field is required.',
            'marketplace_id.uuid' => 'The marketplace_id field must be a valid UUID.',
            'marketplace_id.exists' => 'The marketplace_id field does not exist.',
            'link_url.required' => 'The link_url field is required.',
            'link_url.string' => 'The link_url field must be a string.',
            'order.integer' => 'The order field must be an integer.',
            'order.min' => 'The order field must be at least 1.',
        ];
    }
}
