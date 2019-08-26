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

Route::get('/', function () {
    return redirect('/authors');
});


Route::get('authors/show-data', 'AuthorController@getShowData');
Route::post('authors/datatables', 'AuthorController@postDatatables');
Route::resource('authors', 'AuthorController');
Route::post('books/datatables', 'BookController@postDatatables');
Route::resource('books', 'BookController');