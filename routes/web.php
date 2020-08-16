<?php

use App\Http\Controllers\AuthorController;
use App\Http\Controllers\BookController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\SearchController;
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

Route::get('/', function () {
    return view('welcome');
});

Route::get('login', [LoginController::class, 'show'])
    ->name('login')->middleware(['guest']);

Route::get('logout', [LoginController::class, 'logout']);
Route::post('login', [LoginController::class, 'login']);

Route::group(['prefix' => 'admin',  'middleware' => 'auth'], function() {
    Route::get('dashboard', [LoginController::class, 'dashboard'])->name('dashboard');
    Route::get('books/create', [BookController::class, 'showCreate']);
    Route::post('books/store', [BookController::class, 'store']);
    Route::get('authors/create', [AuthorController::class, 'showCreate']);
    Route::post('authors/store', [AuthorController::class, 'store']);
    Route::get('search/author', [SearchController::class, 'searchAuthor'])->name('search_author');
    Route::get('search/publisher', [SearchController::class, 'searchPublisher'])->name('search_publisher');
});
