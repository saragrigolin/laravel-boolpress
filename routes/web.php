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
})->name('guest.index');

Auth::routes();

Route::middleware('auth')
    ->namespace('Admin')
    ->name('admin.')
    ->prefix('admin')
    ->group(function() {
        Route::get('/', 'HomeController@index')
            ->name('home');
        Route::get('/myposts', 'PostController@indexUser')->name('posts.indexUser');
        Route::resource('posts', 'PostController');
        // Route::get('/posts', 'PostController@index')->name('posts.index');
        // Route::get('/posts/create', 'PostController@create')->name('posts.create');
        // Route::get('/posts/{slug}', 'PostController@show')->name('posts.show');
        // Route::get('/posts/{slug}/edit', 'PostController@edit')->name('posts.edit');
        // Route::patch('/posts/{slug}', 'PostController@update')->name('posts.update');
        // Route::put('/posts/{slug}', 'PostController@update')->name('posts.update');
        // Route::post('/posts', 'PostController@store')->name('posts.store');
        // Route::delete('/posts/{slug}', 'PostController@destroy')->name('posts.destroy');
    });
