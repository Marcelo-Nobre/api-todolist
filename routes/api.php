<?php

use App\Http\Controllers\Api\ItemController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

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

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});


Route::get('/items', [ItemController::class, 'index'])->name('item.index');
Route::prefix('/item')->group(function () {
    Route::post('/store', [ItemController::class, 'store'])->name('item.store');
    Route::put('/{id}', [ItemController::class, 'update'])->name('item.update');
    // Route::get('/lists/{id}', [ItemController::class, 'show'])->name('item.show');
    Route::delete('/{id}', [ItemController::class, 'destroy'])->name('item.destroy');
});
