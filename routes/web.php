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



Route::get('/', 'HomeController@home');
Route::get('/pagination/{id}', 'HomeController@home')->name('pagination');
Route::post('/search/{id}', 'HomeController@search')->name('search');
Route::get('/orders', 'HomeController@orders')->name('orders');
