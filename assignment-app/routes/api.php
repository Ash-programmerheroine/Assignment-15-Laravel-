<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\PostController;
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
Route::get('/',  function(){
    return view('welcome');
});
Route::get('/home', function () {
    return redirect('/dashboard', 302);
});
Route::get('/dashboard', function(){
    return view('dashboard');
});
Route::middleware(['auth'])->group(function () {
    Route::get('/profile', function () {
        // Handle /profile route logic
    });

    Route::get('/settings', function () {
        // Handle /settings route logic
    });
});
Route::resource('products', ProductController::class);
Route::post('/contact', ContactController::class);
Route::resource('posts', PostController::class);
