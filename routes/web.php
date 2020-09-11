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

Route::post('/login', 'LoginController@index');
Route::get('/admin','AdminController@index');
Route::get('/admin/users','AdminController@users');

Route::get('/admin/viewprofile/{username}','AdminController@viewProfile')->name('admin.viewprofile');
Route::post('/admin/viewprofile/{username}','AdminController@viewProfilePost')->name('admin.viewprofile');

Route::get('/admin/register','AdminController@register');
Route::post('/admin/register','AdminController@registerPost');
