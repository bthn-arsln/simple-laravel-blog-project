<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MainController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\MenuController;

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
// Auth işlemleri
Route::get('login', [AuthController::class, 'login'])->name('login');
Route::post('login', [AuthController::class, 'loginPost'])->name('login.post');
Route::get('logout', [AuthController::class, 'logout'])->name('logout');
Route::get('register', [AuthController::class, 'register'])->name('register');
Route::post('register', [AuthController::class, 'registerPost'])->name('register.post');

Route::get('/', [MainController::class, 'index'])->name('home');

Route::get('post/{slug}', [MainController::class, 'post'])->name('post');

Route::get('about', [MainController::class, 'about'])->name('about');

Route::get('contact', [MainController::class, 'contact'])->name('contact');

Route::middleware(['UserCheck', 'IsActive'])->prefix('admin')->name('admin.')->group(function () {
    Route::get('posts/{id}', [PostController::class, 'destroy'])->whereNumber('id')->name('posts.destroy');
    Route::get('/', [DashboardController::class, 'index'])->name('index');
    Route::resource('posts', PostController::class);
    // Kullanıcı işlmleri
    Route::get('users', [UserController::class, 'index'])->name('users');
    Route::get('users/{id}/edit', [UserController::class, 'edit'])->name('user.edit');
    Route::put('users/{id}/update', [UserController::class, 'update'])->name('user.update');
    Route::get('users/{id}', [UserController::class, 'destroy'])->name('user.destroy');
    // Profil işlemleri
    Route::get('profile', [ProfileController::class, 'index'])->name('profile');
    Route::put('profile/{id}', [ProfileController::class, 'update'])->name('profile.update');
    // Site Ayarları
    Route::get('configs', [DashboardController::class, 'configs'])->name('configs');
    Route::post('configs', [DashboardController::class, 'configsUpdate'])->name('configs.update');
    Route::post('config', [DashboardController::class, 'socialPost'])->name('social.post');
    Route::get('config/{id}', [DashboardController::class, 'socialDestroy'])->name('social.destroy');
    // Hakkımda işlemleri
    Route::get('about', [DashboardController::class, 'about'])->name('about');
    Route::put('about', [DashboardController::class, 'aboutUpdate'])->name('about.update');
    // Menü işlemleri
    Route::get('menus/{id}', [MenuController::class, 'destroy'])->name('menus.destroy');
    Route::resource('menus', MenuController::class);
});

Route::get('{url}', [MainController::class, 'pages']);
