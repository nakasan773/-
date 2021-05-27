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

Route::get('/', function () {
    return view('welcome');
});

//ユーザー登録機能
Route::get('signup', 'Auth\RegisterController@showRegistrationForm')->name('signup');
Route::post('signup', 'Auth\RegisterController@register')->name('signup.post');

// ログイン機能
Route::get('login', 'Auth\LoginController@showLoginForm')->name('login');
Route::post('login', 'Auth\LoginController@login')->name('login.post');
Route::get('logout', 'Auth\LoginController@logout')->name('logout');

Auth::routes();

// ログイン状態
Route::group(['middleware' => 'auth'], function() {

    // ユーザ関連
    Route::resource('users', 'UsersController', ['only' => ['index', 'show', 'edit', 'update']]);
    
    Route::get('users/{id}/favorite', 'UsersController@favorite')->name('favorite');
    
    
    //退会機能【未】
    Route::get('users/{id}/delete_confirm', 'UsersController@delete_confirm')->name('delete_confirm');
    Route::get('users/{id}/delete_confirm/destroy', 'UsersController@destroy')->name('destroy');

//Route::group(['middleware' => 'auth'], function () {
  //  Route::resource('users', 'UsersController', ['only' => ['destroy']]);
//});
    
    // フォロー/フォロー解除を追加
    Route::post('users/{user}/follow', 'UsersController@follow')->name('follow');
    Route::delete('users/{user}/unfollow', 'UsersController@unfollow')->name('unfollow');
    
    // ツイート関連
    Route::resource('tweets', 'TweetsController', ['only' => ['index', 'create', 'store', 'show', 'edit', 'update', 'destroy']]);

    Route::get('search', 'SearchController@index')->name('search.tweets');

    // コメント関連
    Route::resource('comments', 'CommentsController', ['only' => ['store']]);
    
    // いいね関連
    Route::resource('favorites', 'FavoritesController', ['only' => ['store', 'destroy']]);
});

