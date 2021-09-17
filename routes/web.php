<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PostsController;
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


   Route::post('/follow/{user}', 'App\Http\Controllers\FollowController@store');
   Route::group(['middleware'=>['auth']],function(){
    Route::post('/p','App\Http\Controllers\PostsController@store');
    Route::get('/p/create','App\Http\Controllers\PostsController@create')->name('posts');
    Route::get('/p/{post}','App\Http\Controllers\PostsController@show');
 });

Route::group(['middleware'=>['auth']],function(){
   Route::get('/dashboard','App\Http\Controllers\DashboardController@index')->name('dashboard');
   Route::post('/dashboard/searchusers','App\Http\Controllers\DashboardController@searchusers')->name('searchusers');
   Route::get('/dashboard/{user}/edit','App\Http\Controllers\DashboardController@edit')->name('dashboard.edit');
   Route::patch('/dashboard/{user}','App\Http\Controllers\DashboardController@update')->name('dashboard.update');
});
Route::group(['middleware'=>['auth']],function(){
    Route::get('/profile/{user}','App\Http\Controllers\ProfileController@show')->name('profile.show');
 });

 Route::group(['middleware'=>['auth']],function(){
    Route::get('/p/comments/{comments}','App\Http\Controllers\CommentController@create');
 });
require __DIR__.'/auth.php';
