<?php

use Illuminate\Support\Facades\Auth;
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

Route::get('/', 'FasaPaydunyaController@index');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::get('/fasapay', 'FasaPaydunyaController@index');
Route::post('/makedonation', 'FasaPaydunyaController@MakePaiement');
Route::get('/pays', 'FasaPaydunyaController@pays');
