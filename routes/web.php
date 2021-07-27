<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;

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


Auth::routes();

// Route of home
Route::get('/', 'HomeController@index')->name('home');
Route::get('/home', 'HomeController@index')->name('home');

Route::group(['prefix' => 'user', 'middleware' => 'auth'], function(){
    // Route of posts
    Route::resource('posts', 'PostController')->parameters([
        'posts' => 'id'
    ])->names([
        'index'     => 'posts.index',
        'create'    => 'post.create',
        'store'     => 'post.store',
        'show'      => 'post.show',
        'edit'      => 'post.edit',
        'update'    => 'post.update',
        'destroy'   => 'post.destroy',
    ]);
});

