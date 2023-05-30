<?php

use Illuminate\Support\Facades\Route;


/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

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



