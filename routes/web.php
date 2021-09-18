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



   
Route::get('/', function(){
      return view('welcome');
}); 


Route::post('/follow/{user}', 'App\Http\Controllers\FollowController@store');
Route::group(['middleware'=>['auth']],function(){
   Route::post('/p','App\Http\Controllers\PostsController@store');
   Route::get('/p/create','App\Http\Controllers\PostsController@create')->name('posts');
   Route::get('/p/edit/{post}','App\Http\Controllers\PostsController@edit');
   Route::get('/p/{post}/edit','App\Http\Controllers\PostsController@editinfo');
   Route::patch('/p/update/{post}','App\Http\Controllers\PostsController@update')->name('post.update');
   
   Route::get('/p/{post}','App\Http\Controllers\PostsController@show');
   Route::delete('/p/delete/{user}','App\Http\Controllers\PostsController@destroy')->name('post.destroy');
 });
   Route::group(['middleware'=>['auth']],function(){
   Route::get('/dashboard','App\Http\Controllers\DashboardController@index')->name('dashboard');
   Route::post('/dashboard/searchusers','App\Http\Controllers\DashboardController@searchusers')->name('searchusers');
   Route::get('/dashboard/{user}/edit','App\Http\Controllers\DashboardController@edit')->name('dashboard.edit');
   Route::patch('/dashboard/{user}','App\Http\Controllers\DashboardController@update')->name('dashboard.update');
   Route::delete('/{user}','App\Http\Controllers\DashboardController@destroy')->name('user.destroy');
});

   Route::group(['middleware'=>['auth']],function(){
   Route::get('/profile/{user}','App\Http\Controllers\ProfileController@show')->name('profile.show');
 });
   Route::group(['middleware'=>['auth']],function(){
   Route::post('/comments/{post}','App\Http\Controllers\CommentController@store')->name('comment.store');
 });
require __DIR__.'/auth.php';