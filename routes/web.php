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

Route::get('/', function () {
    return redirect('/books/list');
});

Route::middleware('isadmin')->group(function () {
//create
Route::get('/books/create','App\Http\Controllers\BookController@create');
Route::post('/books/store','App\Http\Controllers\BookController@store');
Route::post('/books/handlelogin','App\Http\Controllers\BookController@store');

//update
Route::get('books/edit/{id}','App\Http\Controllers\BookController@edit');
Route::post('books/update/{id}','App\Http\Controllers\BookController@update');

//delete
Route::get('books/delete/{id}','App\Http\Controllers\BookController@delete');

//categories
Route::get('categories/create','App\Http\Controllers\CategoryController@create');
Route::post('categories/savecategory','App\Http\Controllers\CategoryController@savecategory');
});




Route::middleware('isloggedin')->group(function () {
    
//read
Route::get('/books/list', 'App\Http\Controllers\BookController@list');
Route::get('/books/show/{id}', 'App\Http\Controllers\BookController@show');
Route::get('users/logout','App\Http\Controllers\UserController@logout');
Route::get('users/notes','App\Http\Controllers\NoteController@notes');
Route::post('users/savenote','App\Http\Controllers\NoteController@savenote');
});

Route::middleware('isloggedout')->group(function () {
//guest
//register
Route::get('users/register','App\Http\Controllers\UserController@register');
Route::post('users/store','App\Http\Controllers\UserController@store');
//login
Route::get('users/login','App\Http\Controllers\UserController@login');
Route::post('users/handlelogin','App\Http\Controllers\UserController@handlelogin');
});
