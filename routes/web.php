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

Auth::routes();
Route::get('/', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

/* Routes for editing  */
Route::group(['prefix' => '/admin', 'middleware' => 'auth'], function () {
    Route::resource('articles', App\Http\Controllers\ArticlesController::class);
    Route::resource('categories', App\Http\Controllers\CategoriesController::class);
});

/* Public routes */
Route::group(['middleware' => 'auth'], function () {
    Route::get('/categories', [App\Http\Controllers\CategoriesController::class, 'list'])->name('categories.list');
    Route::get('/category/{category}', [App\Http\Controllers\CategoriesController::class, 'browse'])->name('category.browse');
});
