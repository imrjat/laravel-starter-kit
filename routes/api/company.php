<?php

Route::middleware(['auth:company-api', 'scopes:company'])->group(function () {
    Route::get('/home', function () {
        return Auth::user();
    })->name('home');
});
