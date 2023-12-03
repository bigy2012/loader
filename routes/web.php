<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\Category;
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




Route::prefix('admin')->group(function () {
    Route::get('/home', [AdminController::class, 'adminHome'])->name('admin.home')->middleware('is_admin');
    Route::get('/post', [PostController::class, 'Post'])->middleware('is_admin');
    Route::get('/new/post/{post_id}/{process}', [PostController::class, 'NewPost'])->middleware('is_admin');
    Route::post('/new/post', [PostController::class, 'ProcessNewPost'])->middleware('is_admin');
    Route::get('/category', [Category::class, 'index'])->middleware('is_admin');
    Route::get('/category/process/{id}', [Category::class, 'CategoryGetById'])->middleware('is_admin');
    Route::post('/category/process', [Category::class, 'Process'])->middleware('is_admin');
});

Route::prefix('/')->group(function () {
    Route::get('/home', [HomeController::class, 'index'])->name('home');
    Route::get('/', [HomeController::class, 'index'])->middleware('visit');
    Route::get('/detail/{name}/{id}', [HomeController::class, 'details'])->middleware('visit');
    Route::get('/category/{id}', [HomeController::class, 'category']);
});


Auth::routes();
