<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

// Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
//     return $request->user();
// });


Route::middleware('isapiloggedin')->group(function(){

    Route::get('/books/list','App\Http\Controllers\ApiController@books');
});

Route::middleware('isapiadmin')->group(function(){

    Route::get('/users/list','App\Http\Controllers\ApiController@users');
});

Route::post('/users/register','App\Http\Controllers\ApiController@register');
Route::post('/users/login','App\Http\Controllers\ApiController@login');
