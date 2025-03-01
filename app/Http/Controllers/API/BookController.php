<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Book;
use App\Http\Requests\BookRequest;
use App\Models\BookImage;

class BookController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {

        return response()->json([
            'message' => 'Daftar buku berhasil diambil.',
            'data' => Book::with('category', 'images', 'purchase')->get()
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(BookRequest $request)
    {
        $book = Book::create($request->all());

        return response()->json([
            'message' => 'Book created successfully',
            'data' => $book
        ], 201);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $book = Book::find($id);

        if (!$book) {
            return response()->json([
                'message' => 'Book not found'
            ], 404);
        }
        return response()->json([
            'message' => 'Book details',
            'data' => $book
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(BookRequest $request, string $id)
    {
        $book = Book::find($id);

        if (!$book) {
            return response()->json([
                'message' => 'Book not found'
            ], 404);
        }

        $book->update($request->all());

        return response()->json([
            'message' => 'Book updated successfully',
            'data' => $book
        ]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $book = Book::find($id);

        if (!$book) {
            return response()->json([
                'message' => 'Book not found'
            ], 404);
        }

        $book->delete();

        return response()->json([
            'message' => "Book $id deleted successfully"
        ]);
    }
}
