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
    return view('welcome');
});

Route::get('home', 'App\Http\Controllers\HomeController@index');

Route::get('login', 'App\Http\Controllers\LoginController@index');

Route::post('login/valida', 'App\Http\Controllers\LoginController@validar')->name('login.val');

Route::post('login/validate', 'App\Http\Controllers\LoginController@validarconRequest')->name('login.validate');




//Route::resource('pasteles', 'App\Http\Controllers\PastelesController');

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
