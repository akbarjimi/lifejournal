<?php

Auth::routes();

Route::view('/','welcome')->name('welcome');
Route::get('/home', 'HomeController@index')->name('home');
