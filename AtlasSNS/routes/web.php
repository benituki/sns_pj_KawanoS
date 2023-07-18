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

// Route::get('/', function () {
//     return view('welcome');
// });

// Auth::routes();

// Route::get('/home', 'HomeController@index')->name('home');

// //ログイン状態
// Route::


//ログアウト中のページ

use App\Http\Controllers\PostsController;
use App\Http\Controllers\followsController;

Route::get('/login', 'Auth\LoginController@login')->name('login');
Route::post('/login', 'Auth\LoginController@login')->name('login');

Route::get('/register', 'Auth\RegisterController@register');
Route::post('/register', 'Auth\RegisterController@register');

Route::get('/added', 'Auth\RegisterController@added');
Route::post('/added', 'Auth\RegisterController@added');

Route::get('/validate', 'App\Http\Requests@validate');
Route::post('/validate', 'App\Http\Requests@validate');

// ログイン制限
Route::group(['middleware' => ['auth','verified']], function(){
// function{実行するもの。これから実行するもの}
    Route::get('/', function(){
        return redirect('/login');
    });

    //ログイン中のページ
    Route::get('/top','PostsController@index');

    //投稿用メソッド移動用ルート
    Route::post('/tweet','PostsController@tweet')->name('post.tweet');

    //投稿内容更新
    Route::post('/update-form', 'PostsController@update');
    Route::get('/update-form', 'PostsController@update');

    //削除
    Route::post('/post/{id}/delete', 'PostsController@delete');
    Route::get('/post/{id}/delete', 'PostsController@delete');

    //プロフィール
    Route::get('/profile','UsersController@profile');

    //検索
    Route::get('/search','UsersController@search')->name('posts.index');
    Route::get('/users/{user_id}', 'UserController@show')->name('users.show');
    // フォロー登録、解除(2023/07/15)
    // Route::post('/follow/{user}', 'followsController@follow')->name('follow');
    // Route::post('/un_follow/{user}', 'followsController@un_follow')->name('un_follow');
    // Route::group(['middleware' => 'auth'], function () {
    //     Route::post('/follow/{userId}', [ followsController::class, 'store']);
    // });

    // Route::group(['middleware' => 'auth'], function () {
    //     Route::post('/follow/{userId}', [ followsController::class, 'store']);
    //     //追加
    //     Route::post('/follow/{userId}/destroy', [ followsController::class, 'destroy']);
    // });

    Route::post('/follow/{user}', 'FollowsController@follow')->name('follow');

    //フォローリスト
    Route::get('/follow-list','FollowsController@followList');
    Route::get('/follower-list','FollowsController@followerList');

    //ログアウト機能（2022/12/26）
    Route::get('/logout', 'Auth\LoginController@logout');

    //ルート定義（2022/12/25）追加
    Route::post('sample', 'FormController@postValidates');

});



