<?php

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

Route::get('/', 'HomeController@index');

//Film Routes
Route::get('/addfilm','FilmController@addpage')->name('addfilm');
Route::post('/addfilm','FilmController@store');


Route::get('/genre/{id}','FilmController@byGenre')->name('by.genre');
Route::get('/studio/{id}','FilmController@byStudio')->name('by.studio');

Route::get('/film/{id}','FilmController@showfilm')->name('show.film');


//Admin
Route::get('/admin-login','AdminController@login')->name('admin.login');
Route::post('/admin-login','AdminController@adminPanel')->name('admin.section');

Route::middleware(['admin'])->group(function(){
	Route::delete('/delfilm/{id}','FilmController@destroy')->name('delfilm');
	Route::get('/films','FilmController@showAll')->name('films');	
	Route::get('/admin-sec','AdminController@adminSection')->name('admin');
	Route::get('/edit/{id}','FilmController@edit')->name('edit.film');
	Route::put('/updatefilm/{id}','FilmController@update')->name('update.film');
});
Route::get('/search','FilmController@search');
//session
Route::get('/delsession','AdminController@logout')->name('delsession');