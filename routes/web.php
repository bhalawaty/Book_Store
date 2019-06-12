<?php

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

Route::get('/', 'HomeController@index')->name('home');

Route::get('/profile/{user}', 'UsersController@show');

Route::get('/books', 'BooksController@index');
Route::get('/books/create', 'BooksController@create');
Route::post('/books/create', 'BooksController@store');
Route::get('/books/{book}', 'BooksController@show');
Route::get('/tag/{tag}', 'TagsController@index');
Route::post('/books/{book}/reviews', 'ReviewsController@store');
Route::post('books/{book}/favorite', 'FavoritesController@store');

