<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the Closure to execute when that URI is requested.
|
*/

Route::get('/',  array('as' => 'home', 'uses' => 'SiteController@getHome'));

//login,register, logout
Route::post('signin/auth', 'SiteController@postSignin');
Route::post('signup/auth', 'SiteController@postSignup');
Route::get('signout', array('as' => 'signout', 'uses' => 'SiteController@getSignout'));
//admin
Route::get('admin/login',array('as'=>'admin/login','uses'=>'AdminController@getLogin'));
Route::post('admin/login','AdminController@postLogin');
Route::get('admin',array('as'=>'admin','uses'=>'AdminController@getAdmin'));
Route::get('admin/logout',array('as'=>'admin/logout','uses'=>'AdminController@getLogout'));
//book
Route::get('book',array('as'=>'book','uses'=>'BookController@getIndex'));
Route::get('delete/Book/{id}',array('as'=>'delete/Book','uses'=>'BookController@getDelete'))->where('{id}', '\d+');
Route::get('bookshow/{id}/{name}',array('as'=>'bookshow','uses'=>'BookController@bookShow'));
Route::get('article/{id}/{title}',array('as'=>'article','uses'=>'ArticleController@getIndex'));
//categories
Route::get('categories',array('as'=>'categories','uses'=>'CategoriesController@getIndex'));
Route::get('tags/{id}/{name}',array('as'=>'tags','uses'=>'TagController@getIndex'));
//About
Route::get('about',array('as'=>'about','uses'=>'AboutController@getIndex'));
Route::get('local',array('as'=>'local','uses'=>'LocalController@getIndex'));
//search
Route::get('search/{word}', array('as'=>'search','uses'=>'SearchController@getIndex'))
    ->where('{word}', '\S+');
//book
Route::get('create/BookList',array('as'=>'create/BookList','uses'=>'BookController@bookList'));
Route::get('create',array('as'=>'create','uses'=>'BookController@getCreate'));
Route::post('create','BookController@postCreate');
//article
Route::get('create/ArticleList',array('as'=>'create/ArticleList','uses'=>'ArticleController@articleList'));
Route::get('create/ArticleCreate',array('as'=>'create/ArticleCreate','uses'=>'ArticleController@articleCreate'));
Route::post('create/ArticleCreate','ArticleController@postCreate');
Route::get('delete/Article/{id}',array('as'=>'delete/Article','uses'=>'ArticleController@getDelete'))->where('{id}', '\d+');
Route::get('edit/Article/{id}',array('as'=>'edit/Article','uses'=>'ArticleController@getEdit'));
Route::post('edit/Article/{id}','ArticleController@postEdit');
Route::get('edit/Book/{id}',array('as'=>'edit/Book','uses'=>'BookController@getEdit'));
Route::post('edit/Book/{id}','BookController@postEdit');
