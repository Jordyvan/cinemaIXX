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

//Route::get('/', 'LoginController@index');



Route::get('/', 'MovieController@index')->name('home');

Route::get('/Register', function () {
    return view('Register');
});

Auth::routes();

Route::get('/home', 'MovieController@index')->name('home');

Route::get('/profile', 'HomeController@profile');
Route::get('/history', 'HomeController@history');
Route::get('/ShowMovies', 'MovieController@index' );
Route::get('/ShowMovies/{film}', 'MovieController@show');
Route::get('/Book/{film}', 'MovieController@book');
Route::get('/LoadMore', 'MovieController@all');
Route::get('/search', 'MovieController@search');
Route::get('/history', 'MovieController@history');
Route::get('/room', 'MovieController@room');
Route::get('/room/{room}', 'MovieController@room');
Route::get('/ticket', 'MovieController@ticket');
Route::get('/movie', 'MovieController@movie');
Route::get('/movie/{film}', 'MovieController@movie');
Route::get('/movie/form/{film}', 'MovieController@FormFilmUpdate');
Route::get('/addRoom', 'RuanganController@create');
Route::get('/addfilm', 'MovieController@FormFilmAdd');
Route::get('/editRoom', 'MovieController@room');
Route::get('/editProfile/{user}', 'UserController@edit');
Route::get('/filter', 'MovieController@filter');

Route::patch('/editProfile/{user}', 'UserController@update');

Route::post('/movie/{film}', 'MovieController@UpdateFilm');

Route::patch('/movie/addfilm', 'MovieController@AddFilm');

Route::delete('/movie/{film}', 'MovieController@DeleteFilm');//belom

Route::patch('/Book/{ruangan}', 'MovieController@StoreBooking');
Route::delete('/ticket/{ruangan}', 'MovieController@DeleteTicket');
Route::patch('/editRoom', 'RuanganController@update');
Route::delete('/room/{room}', 'RuanganController@destroy');
Route::patch('/room/{room}', 'RuanganController@edit');
