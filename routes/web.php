<?php

use App\Http\Controllers\PostController;
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

Route::get('/', function () {
    return view('home', [
        'title' => 'Landing Home Page',
        'name' => 'Belajar Laravel Application News 📖',
    ]);
});

Route::get('/about', function () {
    return view('about', [
        'title' => 'Welcome To About',
        'name' => 'Belajar Laravel Application News 📖',
    ]);
});

Route::get('/contact', function () {
    return view('contact', [
        'title' => 'Welcome to Contact',
        'name' => 'Belajar Laravel Application News 📖',
    ]);
});

Route::resource('/posts', PostController::class);