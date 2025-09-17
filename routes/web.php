<?php

use App\Http\Controllers\CategoryController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::prefix('cms')->name('cms.')->group(function () {
    Route::get('/categories',[CategoryController::class, 'index'])->name('categories.index');
});