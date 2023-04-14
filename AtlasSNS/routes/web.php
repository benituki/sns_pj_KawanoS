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
Route::get('/login', 'Auth\LoginController@login');
Route::post('/login', 'Auth\LoginController@login');

Route::get('/register', 'Auth\RegisterController@register');
Route::post('/register', 'Auth\RegisterController@register');

Route::get('/added', 'Auth\RegisterController@added');
Route::post('/added', 'Auth\RegisterController@added');

Route::get('/validate', 'App\Http\Requests@validate');
Route::post('/validate', 'App\Http\Requests@validate');

//ログイン中のページ
Route::get('/top','PostsController@index');
//投稿用メソッド移動用ルート
Route::post('/tweet','PostsController@tweet')->name('post.tweet');
//投稿内容更新
Route::post('/update-form', 'PostsController@update');
Route::get('/update-form', 'PostsController@update');

//プロフィール
Route::get('/profile','UsersController@profile');
//検索
Route::get('/search','UsersController@search');
//フォロワーリスト
Route::get('/follow-list','followsController@followList');
Route::get('/follower-list','followsController@followerList');

//ログアウト機能（2022/12/26）
Route::get('/logout', 'Auth\LoginController@logout');

//ルート定義（2022/12/25）追加
Route::post('sample', 'FormController@postValidates');


