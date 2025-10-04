<?php

use App\Http\Controllers\CategoryController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::prefix('cms')->name('cms.')->group(function () {
    Route::resource('categories', CategoryController::class);
});
