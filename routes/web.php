<?php

use App\Http\Controllers\LandingController;
use App\Http\Controllers\NewsController;
use App\Http\Controllers\AuthorController;
use Illuminate\Support\Facades\Route;

Route::get('/', [LandingController::class, 'index'])->name('landing');

Route::get('/search', [NewsController::class, 'search'])->name('news.search');
Route::get('/{slug}', [NewsController::class, 'category'])->name('news.category');
Route::get('/news/{slug}', [NewsController::class, 'show'])->name('news.show');
Route::get('/author/{username}', [AuthorController::class, 'show'])->name('author.show');

