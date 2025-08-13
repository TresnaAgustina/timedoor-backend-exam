<?php

use App\Http\Controllers\LogicController;
use App\Http\Controllers\ViewController;
use Illuminate\Support\Facades\Route;


Route::get('/', [ViewController::class, 'index'])->name('book.index');
Route::prefix('book')->group( function () {
    Route::get('/rating', [ViewController::class, 'rating'])->name('book.rating.index');
    Route::post('/store', [LogicController::class, 'store'])->name('book.rating.store');
});

Route::prefix('/author')->group( function () {
    Route::get('/', [ViewController::class, 'toplist'])->name('author.toplist');
});
