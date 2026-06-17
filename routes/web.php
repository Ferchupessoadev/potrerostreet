<?php

use Illuminate\Support\Facades\Route;

Route::view('/', 'welcome.index')->name('home');

Route::middleware(['auth', 'verified'])->group(function () {
    Route::get('/dashboard', fn() => view('dashboard.index'))->name('dashboard');
});
