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

Route::get('/', 'PageController@index');
Route::get('/about', 'PageController@about');
Route::get('/services', 'PageController@services');

Route::resource('posts','PostsController');
// Route::get('/about', function () {
//     return view('pages.about');
// });  

// Route::get('/users/{id}/{name}', function($id, $name) {
//     return 'this is user '.$name.'with id of'.$id;
// });
Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
