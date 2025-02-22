<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\BrandController;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');

Route::get('/ping', function (Request $request) {    
    $connection = DB::connection('mongodb');
    $msg = 'MongoDB is accessible!';
    
    try {  
        $connection->command(['ping' => 1]);  
    } catch (\Exception $e) {  
        $msg = 'MongoDB is not accessible. Error: ' . $e->getMessage();
    }

    return response()->json(['msg' => $msg]);
});
Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});





Route::get('/category', [CategoryController::class, 'index']);
Route::post('/category', [CategoryController::class, 'store']);
Route::get('/category/{id}', [CategoryController::class, 'show']);
Route::put('/category/{id}', [CategoryController::class, 'update']);
Route::delete('/category/{id}', [CategoryController::class, 'destroy']);


Route::get('/product', [ProductController::class, 'index']);
Route::get('/product/{id}', [ProductController::class, 'show']);
Route::delete('/product/{id}', [ProductController::class, 'destroy']);
Route::put('/product/{id}', [ProductController::class, 'update']);
Route::post('/product', [ProductController::class, 'store']);


Route::get('/brand', [BrandController::class, 'index']);
Route::get('/brand/{id}', [BrandController::class, 'show']);
Route::post('/brand', [BrandController::class, 'store']);
Route::delete('/brand/{id}', [BrandController::class, 'destroy']);
Route::put('/brand/{id}', [BrandController::class, 'update']);