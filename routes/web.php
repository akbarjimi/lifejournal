<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\AuthorController;
use App\Http\Controllers\BookController;
use App\Http\Controllers\DirectorController;
use App\Http\Controllers\EditionController;
use App\Http\Controllers\EpisodeController;
use App\Http\Controllers\MoviesController;
use App\Http\Controllers\PublisherController;
use App\Http\Controllers\ScoreController;
use App\Http\Controllers\SerialController;
use App\Http\Controllers\TranslatorController;
use App\Http\Controllers\UserController;


Route::get('/', function () {
    return view('welcome');
});

Route::middleware('auth')->group(function () {
    Route::resource('authors', AuthorController::class);
    Route::resource('books', BookController::class);

    Route::get('directors/{director}/delete', DirectorController::class.'@delete')->name('directors.delete');
    Route::resource('directors', DirectorController::class);
    Route::resource('editions', EditionController::class);
    Route::resource('movies', MoviesController::class);

    Route::get('publishers/{publisher}/delete', PublisherController::class.'@delete')->name('publishers.delete');
    Route::resource('publishers', PublisherController::class);
    Route::resource('scores', ScoreController::class);

    Route::get('serials/{serial}/delete', SerialController::class.'@delete')->name('serials.delete');
    Route::resource('serials', SerialController::class);
    Route::name('serials.')->prefix('serials/{serial}')->group(function (){
        Route::get('episodes/{episode}/delete', EpisodeController::class.'@delete')->name('episodes.delete');    
        Route::resource('episodes', EpisodeController::class);
    }, null);

    Route::resource('translators', TranslatorController::class);
    Route::resource('users', UserController::class);
}, null);