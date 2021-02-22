<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MainController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\PostController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/


Route::get('/', [MainController::class, 'index'])->name('home');

Route::get('post/{slug}', [MainController::class, 'post'])->name('post');

Route::get('contact', function () {
    return view('contact');
});
Route::get('about', function () {
    return view('about');
});

Route::get('login', [AuthController::class, 'index'])->name('login');
Route::post('login', [AuthController::class, 'login'])->name('login.post');
Route::get('logout', [AuthController::class, 'logout'])->name('logout');
Route::get('register', [AuthController::class, 'register'])->name('register');

Route::middleware('IsAdmin')->prefix('admin')->name('admin.')->group(function () {
    Route::get('posts/{id}', [PostController::class, 'destroy'])->whereNumber('id')->name('posts.destroy');
    Route::get('/', [DashboardController::class, 'index'])->name('index');
    Route::resource('posts', PostController::class);
});
