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

Route::get('/about', function () {
    return view('about');
});

Route::get('/contact', function () {
    return view('contact');
});

Route::get('/mongodb', function () {
    return view('mongodb');
});

///////////////////Admin.ActionMovies Route///////////////////

Route::get('/admin/ActionMovies', 'ActionController@index');

Route::get('/admin/ActionMovies/create', 'ActionController@Create');

Route::post('/admin/ActionMovies/create', 'ActionController@Store');

Route::post('/admin/ActionMovies/edit', 'ActionController@Update');

Route::get('/admin/ActionMovies/delete/{id}', 'ActionController@delete');

Route::delete('/admin/ActionMovies/delete', 'ActionController@remove');

Route::get('/admin/ActionMovies/edit/{id}', 'ActionController@edit');

Route::get('/admin/ActionMovies/{id}', 'ActionController@details');

//////////////////Users.ActionMovies Route////////////////////

Route::get('/ActionMovies', 'ActionController@userindex1')->name('userindex1');

Route::get('/ActionMovies/{id}', 'ActionController@userdetails1')->name('userdetails1');

///////////////////Admin.ComedyMovies Route///////////////////           COMEDY

Route::get('/admin/ComedyMovies', 'ComedyController@index');

Route::get('/admin/ComedyMovies/create', 'ComedyController@Create');

Route::post('/admin/ComedyMovies/create', 'ComedyController@Store');

Route::post('/admin/ComedyMovies/edit', 'ComedyController@Update');

Route::get('/admin/ComedyMovies/delete/{id}', 'ComedyController@delete');

Route::delete('/admin/ComedyMovies/delete', 'ComedyController@remove');

Route::get('/admin/ComedyMovies/edit/{id}', 'ComedyController@edit');

Route::get('/admin/ComedyMovies/{id}', 'ComedyController@details');

//////////////////Users.ComedyMovies Route////////////////////

Route::get('/ComedyMovies', 'ComedyController@userindex2')->name('userindex2');

Route::get('/ComedyMovies/{id}', 'ComedyController@userdetails2')->name('userdetails2');


///////////////////Admin.DramaMovies Route///////////////////

Route::get('/admin/DramaMovies', 'DramaController@index');

Route::get('/admin/DramaMovies/create', 'DramaController@Create');

Route::post('/admin/DramaMovies/create', 'DramaController@Store');

Route::post('/admin/DramaMovies/edit', 'DramaController@Update');

Route::get('/admin/DramaMovies/delete/{id}', 'DramaController@delete');

Route::delete('/admin/DramaMovies/delete', 'DramaController@remove');

Route::get('/admin/DramaMovies/edit/{id}', 'DramaController@edit');

Route::get('/admin/DramaMovies/{id}', 'DramaController@details');

//////////////////Users.DramaMovies Route////////////////////

Route::get('/DramaMovies', 'DramaController@userindex3')->name('userindex3');

Route::get('/DramaMovies/{id}', 'DramaController@userdetails3')->name('userdetails3');

///////////////////Admin.HorrorMovies Route///////////////////

Route::get('/admin/HorrorMovies', 'HorrorController@index');

Route::get('/admin/HorrorMovies/create', 'HorrorController@Create');

Route::post('/admin/HorrorMovies/create', 'HorrorController@Store');

Route::post('/admin/HorrorMovies/edit', 'HorrorController@Update');

Route::get('/admin/HorrorMovies/delete/{id}', 'HorrorController@delete');

Route::delete('/admin/HorrorMovies/delete', 'HorrorController@remove');

Route::get('/admin/HorrorMovies/edit/{id}', 'HorrorController@edit');

Route::get('/admin/HorrorMovies/{id}', 'HorrorController@details');

//////////////////Users.HorrorMovies Route////////////////////

Route::get('/HorrorMovies', 'HorrorController@userindex4')->name('userindex4');

Route::get('/HorrorMovies/{id}', 'HorrorController@userdetails4')->name('userdetails4');


////////////////////////////////////////////////////////////

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
