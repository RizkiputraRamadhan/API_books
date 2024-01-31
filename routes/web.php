<?php

use App\Http\Controllers\BooksController;
use App\Http\Controllers\CategoriesController;
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
    return view('welcome');
});

Route::get('/categories', [CategoriesController::class, 'index'])->name('categories-index');
Route::post('/categories', [CategoriesController::class, 'store'])->name('categories-store');
Route::get('/categories/create', [CategoriesController::class, 'create'])->name('categories-create');
Route::get('/categories/{categories}', [CategoriesController::class, 'edit'])->name('categories-edit');
Route::patch('/categories/{categories}', [CategoriesController::class, 'update'])->name('categories-update');
Route::delete('/categories/{categories}', [CategoriesController::class, 'delete'])->name('categories-delete');

Route::get('/books', [BooksController::class, 'index'])->name('books-index');
Route::post('/books', [BooksController::class, 'store'])->name('books-store');
Route::get('/books/create', [BooksController::class, 'create'])->name('books-create');
Route::get('/books/{books}', [BooksController::class, 'edit'])->name('books-edit');

Route::patch('/books/{books}', [CategoriesController::class, 'update'])->name('books-update');
Route::delete('/books/{books}', [CategoriesController::class, 'delete'])->name('books-delete');