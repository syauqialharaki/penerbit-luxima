<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class BookRequest extends FormRequest
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
            'category_id' => 'nullable|uuid|exists:categories,id',
            'category_name' => 'nullable|string|max:255|unique:categories,name',
            'description' => 'nullable|string',
            'author' => 'nullable|string|max:255',
            'publisher' => 'nullable|string|max:255',
            'isbn' => 'nullable|string|unique:books,isbn',
            'year' => 'nullable|integer',
            'stock' => 'nullable|integer',
            'price' => 'nullable|integer',
        ];
    }

    public function messages(): array
    {
        return [
            'title.required' => 'The title field is required.',
            'image.image' => 'The image field must be an image.',
            'image.mimes' => 'The image field must be a file of type: jpeg, png, jpg, gif.',
            'image.max' => 'The image field may not be greater than 2MB.',
            'category_id.required' => 'The category field is required.',
            'category_id.exists' => 'The selected category does not exist.',
            'isbn.unique' => 'The ISBN has already been taken.',
            'year.min' => 'The year must be at least 1000.',
            'year.max' => 'The year must not be greater than the current year.',
            'price.min' => 'The price must be at least 0.',
            'stock.min' => 'The stock must be at least 0.',
            'stock.max' => 'The stock must not be greater than the number of books in stock.',
            'isbn.numeric' => 'The ISBN must be a number.',
            'price.integer' => 'The price must be an integer.',
            'stock.integer' => 'The stock must be an integer.',
            'year.integer' => 'The year must be an integer.',
            'title.string' => 'The title must be a string.',
            'description.string' => 'The description must be a string.',
            'author.string' => 'The author must be a string.',
            'publisher.string' => 'The publisher must be a string.',
            'title.max' => 'The title must not be greater than 255 characters.',
            'description.max' => 'The description must not be greater than 255 characters.',
            'author.max' => 'The author must not be greater than 255 characters.',
            'publisher.max' => 'The publisher must not be greater than 255 characters.',
            'isbn.unique' => 'The ISBN has already been taken.',
            'year.min' => 'The year must be at least 1000.',
            'year.max' => 'The year must not be greater than the current year.',
            'price.min' => 'The price must be at least 0.',
            'stock.min' => 'The stock must be at least 0.',
            'stock.max' => 'The stock must not be greater than the number of books in stock.',
            'isbn.numeric' => 'The ISBN must be a number.',
            'price.integer' => 'The price must be an integer.',
            'stock.integer' => 'The stock must be an integer.',
            'year.integer' => 'The year must be an integer.'
        ];
    }
}
