<?php
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;

Route::get('/test', function () {
    return response()->json(['message' => 'API is working']);
});
Route::post('/register', [UserController::class, 'register']);
Route::post('/sign-in', [UserController::class, 'signIn']);
Route::post('/forgot-password', [UserController::class, 'forgotPassword']);
Route::post('/update-password', [UserController::class, 'updatePassword']);