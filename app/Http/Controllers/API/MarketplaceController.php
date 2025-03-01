<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Marketplace;
use App\Http\Requests\MarketplaceRequest;

class MarketplaceController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $marketplace = Marketplace::all();

        return response()->json([
            'message' => 'List of marketplaces',
            'data' => $marketplace
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(MarketplaceRequest $request)
    {
        $marketplace = Marketplace::create($request->all());

        return response()->json(
            [
                'message' => 'Marketplace added successfully',
                'result' => $marketplace
            ],
            201
        );
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $marketplace = Marketplace::find($id);

        if (!$marketplace) {
            return response()->json([
                'message' => 'Marketplace not found'
            ], 404);
        }
        return response()->json([
            'message' => 'Marketplace details',
            'data' => $marketplace
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $marketplace = Marketplace::find($id);

        if (!$marketplace) {
            return response()->json([
                'message' => 'Marketplace not found'
            ], 404);
        }

        $marketplace->update($request->all());

        return response()->json([
            'message' => 'Marketplace updated successfully',
            'data' => $marketplace
        ]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $marketplace = Marketplace::find($id);

        if (!$marketplace) {
            return response()->json([
                'message' => 'Marketplace not found'
            ], 404);
        }

        $marketplace->delete();

        return response()->json([
            'message' => "Marketplace $id deleted successfully"
        ]);
    }
}
