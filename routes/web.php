<?php

use Illuminate\Support\Facades\Route;
use App\Http\Livewire;

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

Route::get('/', 'App\Http\Controllers\BlogController@index');

// Route::get('/home', function () {
//     return view('home');
//  });


Route::group(['middleware' => 'auth'], function(){

	Route::resource('/category', 'App\Http\Controllers\CategoryController');
	Route::resource('/tag', 'App\Http\Controllers\TagController');
	Route::get('/post/trashed', 'App\Http\Controllers\PostController@trashed')->name('post.trashed');
	Route::get('/post/restore/{id}', 'App\Http\Controllers\PostController@restore')->name('post.restore');
	Route::delete('/post/kill/{id}', 'App\Http\Controllers\PostController@kill')->name('post.kill');
	Route::resource('/post', 'App\Http\Controllers\PostController');
	Route::resource('/user', 'App\Http\Controllers\userController');


});



// Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', function () {
//     return view('dashboard');
// })->name('dashboard');
Route::middleware(['auth:sanctum', 'verified'])->get('/home', function () {
    return view('home');
})->name('home');