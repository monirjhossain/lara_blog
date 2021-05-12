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

// Route::get('/', function () {
//     return view('welcome');
// });



Auth::routes();

Route::get('/', 'HomeController@index')->name('home');
Route::get('/posts', 'HomeController@posts')->name('posts');
Route::get('/post/{slug}', 'HomeController@post')->name('post');
Route::get('/categories', 'HomeController@categories')->name('categories');
Route::get('/category/{slug}', 'HomeController@categoryPost')->name('category.post');

//Admin Route//
Route::group(['prefix' => 'admin', 'as' => 'admin.', 'namespace'=> 'Admin', 'middleware'=>['auth','admin']], function(){
    Route::get('dashboard', 'DashboardController@index')->name('dashboard');
    Route::get('profile', 'DashboardController@showProfile')->name('profile');
    Route::put('profile', 'DashboardController@updateProfile')->name('profile.update');
    Route::put('profile.password', 'DashboardController@changePassword')->name('profile.password');
    Route::resource('users', 'UserController');
    Route::resource('category', 'CategoryController')->except(['create','show','edit']);
    Route::resource('post', 'PostController');
});

//User Route//
Route::group(['prefix' => 'user', 'as' => 'user.', 'namespace' => 'user', 'middleware' => ['auth', 'user']], function () {
    Route::get('dashboard', 'DashboardController@index')->name('dashboard');
});
