<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\BookController;
use App\Http\Controllers\ChapterController;
use App\Http\Controllers\GenreController;
use App\Http\Controllers\IndexController;

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

// View client
Route::get('/', [IndexController::class, 'home']);
Route::get('/books/{slug}', [IndexController::class, 'book']);
Route::get('/category-user/{slug}', [IndexController::class, 'category']);
Route::get('/chapter-user/{slug}', [IndexController::class, 'chapter']);
Route::get('/genre-user/{slug}', [IndexController::class, 'genre']);


Auth::routes();

// Admin
Route::get('/home', [HomeController::class, 'index'])->name('home');

Route::resource('/category', CategoryController::class);
Route::resource('/book', BookController::class);
Route::resource('/chapter', ChapterController::class);
Route::resource('/genre', GenreController::class);
