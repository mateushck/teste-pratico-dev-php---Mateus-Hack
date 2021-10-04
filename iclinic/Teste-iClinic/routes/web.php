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


Route::get('/lista', 'App\Http\Controllers\BancodeSangueController@lista')->name('lista');

Route::get('/cadastra', 'App\Http\Controllers\BancodeSangueController@cadastra')->name('cadastra');


