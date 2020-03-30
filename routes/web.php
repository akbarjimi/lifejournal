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

Route::middleware('auth')->group(function () {
    Route::resource('authors', AuthorController::class);
    Route::resource('books', BookController::class);
    Route::resource('directors', DirectorController::class);
    Route::resource('editions', EditionController::class);
    Route::resource('episodes', EpisodeController::class);
    Route::resource('movies', MoviesController::class);
    Route::resource('publishers', PublisherController::class);
    Route::resource('scores', ScoreController::class);
    Route::resource('serials', SerialController::class);
    Route::resource('translators', TranslatorController::class);
    Route::resource('users', UserController::class);
}, null);