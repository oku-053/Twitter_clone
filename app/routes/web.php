<?php

use App\Http\Requests\PostRequest;
use App\Http\Controllers\FormController;
use App\Http\Controllers\TweetsController;
use App\Http\Controllers\SampleController;
use App\Http\Controllers\UsersController;
use App\Http\Controllers\CommentsController;
use App\Http\Controllers\FavoritesController;
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

//初期表示のページ
Route::get('/', [App\Http\Controllers\TopController::class, 'index']);

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

//ログインしているユーザー限定のルート
Route::group(['middleware' => 'auth'], function () {

    // ユーザ関連
    Route::resource('users', 'App\Http\Controllers\UsersController', ['only' => ['index', 'show', 'edit', 'update']]);

    //フォローする
    Route::post('users/{user}/follow', [App\Http\Controllers\UsersController::class, 'follow'])->name('follow');
    //フォロー解除する
    Route::delete('users/{user}/unfollow', [App\Http\Controllers\UsersController::class, 'unfollow'])->name('unfollow');

    // ツイート関連
    Route::resource('tweets', 'App\Http\Controllers\TweetsController', ['only' => ['index', 'create', 'store', 'show', 'destroy']]);

    Route::post('tweets/favorite/{id}', 'App\Http\Controllers\FavoritesController@favorite')->name('tweets.favorite');
});
