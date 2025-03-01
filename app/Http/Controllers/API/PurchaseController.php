<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\PurchaseRequest;
use App\Models\Purchase;
use App\Models\Book;

class PurchaseController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return response()->json([
            'message' => 'List of purchase links',
            'data' => Purchase::with('book', 'marketplace')->get()
        ]);

        return response()->json([
            'message' => 'Daftar buku berhasil diambil.',
            'data' => Book::with('category', 'images', 'purchase')->get()
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(PurchaseRequest $request)
    {
        $purchase = Purchase::create($request->all());

        return response()->json([
            'message' => 'Purchase link added successfully.',
            'data' => $purchase
        ], 201);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $purchase = Purchase::find($id);

        if (!$purchase) {
            return response()->json([
                'message' => 'Purchase not found'
            ], 404);
        }
        return response()->json([
            'message' => 'Purchase details',
            'data' => $purchase
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $purchase = Purchase::find($id);

        if (!$purchase) {
            return response()->json([
                'message' => 'Purchase not found'
            ], 404);
        }

        $purchase->update($request->all());

        return response()->json([
            'message' => 'Purchase link updated successfully',
            'data' => $purchase
        ]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $purchase = Purchase::find($id);

        if (!$purchase) {
            return response()->json([
                'message' => 'Purchase not found'
            ], 404);
        }

        $purchase->delete();

        return response()->json([
            'message' => 'Purchase link deleted successfully.'
        ], 200);
    }
}
