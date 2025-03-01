<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Category;
use App\Http\Requests\CategoryRequest;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $category = Category::all();

        return response()->json([
            'message' => 'List of categories',
            'data' => $category
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(CategoryRequest $request)
    {
        $category = Category::create($request->all());

        return response()->json(
            [
                'message' => 'Category created successfully',
                'result' => $category
            ],
            201
        );
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $category = Category::find($id);

        if (!$category) {
            return response()->json([
                'message' => 'Category not found'
            ], 404);
        }
        return response()->json([
            'message' => 'Category details',
            'data' => $category
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(CategoryRequest $request, string $id)
    {
        $category = Category::find($id);

        if (!$category) {
            return response()->json([
                'message' => 'Category not found'
            ], 404);
        }

        $category->update($request->all());

        return response()->json([
            'message' => 'Category updated successfully',
            'data' => $category
        ]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $category = Category::find($id);

        if (!$category) {
            return response()->json([
                'message' => 'Category not found'
            ], 404);
        }

        $category->delete();

        return response()->json([
            'message' => "Category $id deleted successfully"
        ]);
    }
}
