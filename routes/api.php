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

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

Route::get('category/all','App\Http\Controllers\CategoryController@getAllCategory');
Route::get('category/find/{id}','App\Http\Controllers\CategoryController@getCategoryxId');
Route::get('category/findc/{category_name}','App\Http\Controllers\CategoryController@getCategoryxType');
Route::post('category/create','App\Http\Controllers\CategoryController@createCategory');
Route::put('category/update/{id}','App\Http\Controllers\CategoryController@updateCategory');
Route::delete('category/delete/{id}','App\Http\Controllers\CategoryController@deleteCategory');




Route::get('movie/all','App\Http\Controllers\MovieController@getAllMovies');
Route::get('movie/join','App\Http\Controllers\MovieController@getJoinMovies');
Route::get('movie/joins/{id}','App\Http\Controllers\MovieController@getJoinMoviexId');
Route::post('movie/create','App\Http\Controllers\MovieController@createMovie');
Route::put('movie/update/{id}','App\Http\Controllers\MovieController@updateMovie');
Route::delete('movie/delete/{id}','App\Http\Controllers\MovieController@deleteMovie');
