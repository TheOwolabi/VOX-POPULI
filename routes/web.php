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

Route::resource('/', 'RootPagesController');

Route::resource('/metier', 'MetiersController');
Route::resource('/officiel', 'OfficielController');
Route::resource('/poste', 'PostesController');
Route::resource('/idea', 'IdeaController');
Route::post('/idea/{idea}/vote','VoteIdeaController@store');
Route::delete('/idea/{idea}/vote','VoteIdeaController@destroy');
Route::post('/idea/{idea}/favorite','FavoriteIdeaController@store');
Route::delete('/idea/{idea}/favorite','FavoriteIdeaController@destroy');
Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
