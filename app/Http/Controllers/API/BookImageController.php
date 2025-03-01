<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\Book;
use Illuminate\Http\Request;
use App\Http\Requests\BookImageRequest;
use App\Models\BookImage;

class BookImageController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $bookImage = BookImage::all();

        return response()->json([
            'message' => 'List of book images',
            'data' => $bookImage
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(BookImageRequest $request)
    {
        $bookImage = BookImage::create($request->validated());

        return response()->json([
            'message' => 'Book image added successfully.',
            'data' => $bookImage
        ], 201);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $bookImage = BookImage::find($id);

        if (!$bookImage) {
            return response()->json([
                'message' => 'Book image not found'
            ], 404);
        }
        return response()->json([
            'message' => 'Book image details',
            'data' => $bookImage
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $bookImage = BookImage::find($id);

        if (!$bookImage) {
            return response()->json([
                'message' => 'Book image not found'
            ], 404);
        }

        $bookImage->update($request->all());

        return response()->json([
            'message' => 'Book image updated successfully',
            'data' => $bookImage
        ]);
    }

    /**
     * Remove the specified resource from storage.
     */

    public function destroy(string $id)
    {
        $bookImage = BookImage::find($id);

        if (!$bookImage) {
            return response()->json([
                'message' => 'Book image not found'
            ], 404);
        }

        $bookImage->delete();

        return response()->json([
            'message' => "Book image $id deleted successfully"
        ]);
    }
}
