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


Route::name('home')->get('/','mainController@index');

Route::name('store_thread_path')->post('/','mainController@newThread');

Route::name('thread_path')->get('/thread/{thread}','mainController@showThread');

Route::name('create_post_path')->post('/thread/{thread}','mainController@postComment');

