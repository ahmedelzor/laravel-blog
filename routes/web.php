<?php

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

// Route::get('/', function () {
//     return view('welcome');
// });


Auth::routes();

// Route::get('/home', 'HomeController@index')->name('home');

Route::get('/' , 'ArticleController@index' )->name('Article.index');

#########   Article Route  #########

// Displye Data 
Route::get('Article' , 'ArticleController@index' )->name('Article.index');

// create Data 
Route::get('Article/create' , 'ArticleController@create' )->name('Article.create');

// store Data 
Route::post('Article/store' , 'ArticleController@store' )->name('Article.store');

// show Data 
Route::get('Article/show/{id}' , 'ArticleController@show' )->name('Article.show');

// edit Data 
Route::get('Article/edit/{id}' , 'ArticleController@edit' )->name('Article.edit');

// update Data 
Route::post('Article/update/{id}' , 'ArticleController@update' )->name('Article.update');

// Remove Data 
Route::get('Article/destroy/id/{id}' , 'ArticleController@destroy' )->name('Article.destroy');



#########   Comment Route  #########


// Displye Comment 
Route::get('comments' , 'CommentsController@index' )->name('Comment.addcomment');

// store Comment 
Route::post('comments/store' , 'CommentsController@store' )->name('Comment.store');

// Remove Comment 
Route::get('comments/destroy/id/{id}' , 'CommentsController@destroy' )->name('Comment.destroy');

