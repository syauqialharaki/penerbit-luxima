<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\API\CategoryController;
use App\Http\Controllers\API\MarketplaceController;
use App\Http\Controllers\API\BookController;
use App\Http\Controllers\API\BookImageController;
use App\Http\Controllers\API\PurchaseController;


/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::prefix('v1')->group(function () {
    Route::apiResource('kategori', CategoryController::class);
    Route::apiResource('marketplace', MarketplaceController::class);
    Route::apiResource('katalog', BookController::class);
    Route::apiResource('gambar-buku', BookImageController::class);
    Route::apiResource('link-pembelian', PurchaseController::class);
});
