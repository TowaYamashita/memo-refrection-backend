<?php
  
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
  
use App\Http\Controllers\API\AuthController;
use App\Http\Controllers\API\ReflectionController;
  
/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
*/
  
Route::post('login', [AuthController::class, 'signin']);
Route::post('register', [AuthController::class, 'signup']);
     
Route::middleware('auth:sanctum')->group( function () {
    Route::get('/reflections', [ReflectionController::class, 'index']);
    Route::post('/reflection', [ReflectionController::class, 'store']);
    Route::delete('/reflection/{id}', [ReflectionController::class, 'destroy']);
});
