<?php

use Illuminate\Support\Facades\Route;

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
// main
Route::get('/', [\App\Http\Controllers\BookController::class, 'booksAll'])->name('/');;
// main end

// book
Route::post('/bookForm_create', [\App\Http\Controllers\BookController::class, 'bookForm_create']);
Route::get('/book_details', [\App\Http\Controllers\BookController::class, 'book_details'])->name('book_details');
Route::delete('/book_delete', [\App\Http\Controllers\BookController::class, 'book_delete'])->name('book_delete');
Route::put('/book_edit', [\App\Http\Controllers\BookController::class, 'book_edit']);
// book end

// author
Route::get('/authorsAll', [\App\Http\Controllers\AuthorController::class, 'authorsAll'])->name('authorsAll');
Route::post('/authorForm_create', [\App\Http\Controllers\AuthorController::class, 'authorForm_create']);
Route::get('/author_details', [\App\Http\Controllers\AuthorController::class, 'author_details'])->name('author_details');
Route::delete('/author_delete', [\App\Http\Controllers\AuthorController::class, 'author_delete'])->name('author_delete');
Route::put('/author_edit', [\App\Http\Controllers\AuthorController::class, 'author_edit']);
// author end

//Route::get('/user/{id}/{name}', function ($id,$name) {
//    return 'id'.$id."<br>"."name".$name;
//});
