<?php

use App\Http\Controllers\CustomerController;
use App\Http\Controllers\InvoiceController;
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




Route::prefix('customers')->group(function () {
    Route::get('/', [CustomerController::class, 'index']); 
    Route::post('/', [CustomerController::class, 'store']); 
    Route::get('/{id}', [CustomerController::class, 'show']); 
    Route::put('/{id}', [CustomerController::class, 'update']); 
    Route::delete('/{id}', [CustomerController::class, 'destroy']);
});

Route::prefix('invoices')->group(function () {
    Route::get('/', [InvoiceController::class, 'index']); 
    Route::post('/', [InvoiceController::class, 'store']); 
    Route::get('/{id}', [InvoiceController::class, 'show']); 
    Route::put('/{id}', [InvoiceController::class, 'update']); 
    Route::delete('/{id}', [InvoiceController::class, 'destroy']);
});