<?php

use App\Http\Controllers\PermissionController;
use App\Http\Controllers\RolController;
use App\Http\Controllers\UserPermissionController;
use App\Http\Controllers\UsersController;
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


Route::prefix('users')->group(function () {
    Route::get('/', [UsersController::class, 'index']); 
    Route::post('/', [UsersController::class, 'store']); 
    Route::get('/{id}', [UsersController::class, 'show']); 
    Route::put('/{id}', [UsersController::class, 'update']); 
    Route::delete('/{id}', [UsersController::class, 'destroy']);
});

Route::prefix('rol')->group(function () {
    Route::get('/', [RolController::class, 'index']); 
    Route::post('/', [RolController::class, 'store']); 
    Route::get('/{id}', [RolController::class, 'show']); 
    Route::put('/{id}', [RolController::class, 'update']); 
    Route::delete('/{id}', [RolController::class, 'destroy']);
});

Route::prefix('userspermission')->group(function () {
    Route::get('/', [UserPermissionController::class, 'index']); 
    Route::post('/', [UserPermissionController::class, 'store']); 
    Route::get('/{id}', [UserPermissionController::class, 'show']); 
    Route::put('/{id}', [UserPermissionController::class, 'update']); 
    Route::delete('/{id}', [UserPermissionController::class, 'destroy']);
});

Route::prefix('permission')->group(function () {
    Route::get('/', [PermissionController::class, 'index']); 
    Route::post('/', [PermissionController::class, 'store']); 
    Route::get('/{id}', [PermissionController::class, 'show']); 
    Route::put('/{id}', [PermissionController::class, 'update']); 
    Route::delete('/{id}', [PermissionController::class, 'destroy']);
});