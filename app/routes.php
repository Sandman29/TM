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

/*
 * The following routes are for the main functionality of the application
 */


/**
* Index
*/
Route::get('/', 'IndexController@getIndex');
/**
* User
* (Explicit Routing)
*/
Route::get('/signup','UserController@getSignup' );
Route::get('/login', 'UserController@getLogin' );
Route::post('/signup', 'UserController@postSignup' );
Route::post('/login', 'UserController@postLogin' );
Route::get('/logout', 'UserController@getLogout' );
/**
* Task (or what I call Item)
* (Explicit Routing)
*/
Route::get('/task', 'ItemController@getIndex');
Route::get('/task/completed-task', 'ItemController@getCompetedTasks');
Route::get('/task/not-completed-tasks', 'ItemController@getNotCompletedTasks');
Route::get('/task/edit/{id}', 'ItemController@getEdit');
Route::post('/task/edit', 'ItemController@postEdit');
Route::get('/task/create', 'ItemController@getCreate');
Route::post('/task/create', 'ItemController@postCreate');
Route::get('/task/delete/{id}', 'ItemController@getDelete');
Route::get('/task/completed/{id}', 'ItemController@getCompleted');
/**
* Category
* (Explicit Routing)
*/
Route::get('/category', 'CategoryController@getIndex');
Route::get('/category/edit/{id}', 'CategoryController@getEdit');
Route::post('/category/edit', 'CategoryController@postEdit');
Route::get('/category/create', 'CategoryController@getCreate');
Route::post('/category/create', 'CategoryController@postCreate');
Route::get('/category/delete/{id}', 'CategoryController@getDelete');
#Route::post('/task/delete', 'CategoryController@postDelete');

/**
* Debug
* (Explicit Routing)
*/


Route::get('/debug', 'DebugController@getDebug');

