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
Route::get('/idea-stats', 'AdminController@stats')->name('stats');
Route::post('/set-status/{idea}', 'AdminController@status')->name('status');
Route::get('/verification', 'NexmoController@show')->name('nexmo');
Route::post('/verification', 'NexmoController@verify')->name('nexmo');
Route::resource('/metier', 'MetiersController');
Route::resource('/actualite', 'ActualiteController');
Route::resource('/officiel', 'OfficielController');
Route::resource('/poste', 'PostesController');
Route::resource('/categorie', 'CategoriesController');
Route::resource('/idea', 'IdeaController');
Route::resource('idea.comment', 'CommentsController');
Route::post('/idea/{idea}/vote','VoteIdeaController@store');
Route::delete('/idea/{idea}/vote','VoteIdeaController@destroy');
Route::post('/idea/{idea}/favorite','FavoriteIdeaController@store');
Route::delete('/idea/{idea}/favorite','FavoriteIdeaController@destroy');
Route::post('/actualite/{actualite}/favorite','FavoriteActualiteController@store');
Route::delete('/actualite/{actualite}/favorite','FavoriteActualiteController@destroy');
Route::post('/idea/{idea}/comment/{comment}/vote','VoteIdeaCommentsController@store');
Route::delete('/idea/{idea}/comment/{comment}/vote','VoteIdeaCommentsController@destroy');
Route::post('/actualite/{actualite}/vote','VoteActualiteController@store');
Route::delete('/actualite/{actualite}/vote','VoteActualiteController@destroy');
Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
