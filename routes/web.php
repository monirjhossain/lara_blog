<?php

use App\Post;
use App\Tag;
use Illuminate\Support\Facades\View;
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
Route::get('/search', 'HomeController@search')->name('search');
Route::get('/tag/{name}', 'HomeController@tagPosts')->name('tag.posts');
Route::post('/comment/{post}', 'CommentController@store')->name('comment.store');
Route::post('comment-reply/{comment}', 'CommentReplyController@store')->name('reply.store');
Route::post('/like-post/{post}', 'HomeController@likePost')->name('like-post')->middleware('auth'); 


//Admin Route//
Route::group(['prefix' => 'admin', 'as' => 'admin.', 'namespace'=> 'Admin', 'middleware'=>['auth','admin']], function(){
    Route::get('dashboard', 'DashboardController@index')->name('dashboard');
    Route::get('profile', 'DashboardController@showProfile')->name('profile');
    Route::put('profile', 'DashboardController@updateProfile')->name('profile.update');
    Route::put('profile.password', 'DashboardController@changePassword')->name('profile.password');
    Route::resource('users', 'UserController');
    Route::resource('category', 'CategoryController')->except(['create','show','edit']);
    Route::resource('post', 'PostController');
    Route::get('comments', 'CommentController@index')->name('comment.index');
    Route::delete('comment/{id}', 'CommentController@destroy')->name('comment.destroy');
    Route::get('reply-comments', 'CommentReplyController@index')->name('reply-comment.index');
    Route::delete('reply-comment/{id}', 'CommentReplyController@destroy')->name('reply-comment.destroy');
    
});


//User Route//
Route::group(['prefix' => 'user', 'as' => 'user.', 'namespace' => 'user', 'middleware' => ['auth', 'user']], function () {
    Route::get('dashboard', 'DashboardController@index')->name('dashboard');
    Route::get('comments', 'CommentController@index')->name('comment.index');
    Route::delete('comment/{id}', 'CommentController@destroy')->name('comment.destroy');
    Route::get('reply-comments', 'CommentReplyController@index')->name('reply-comment.index');
    Route::delete('reply-comment/{id}', 'CommentReplyController@destroy')->name('reply-comment.destroy');
});

//View Composser
View::composer('layouts.frontend.partials.sidebar', function($view){
    $recentPosts = Post::latest()->take(3)->get();
    $recentTags = Tag::all();
    return $view->with('recentTags', $recentTags)->with('recentPosts', $recentPosts);
});