<?php

use Illuminate\Support\Facades\Route;

Route::middleware(['web'])->group(function () {

    if (App::environment('local')) {
        Route::get('/login-user1', function () {
            Auth::loginUsingId(1);
            return back();
        })->name('login-user1');

        Route::view('dev', 'dev')->name('dev');
    }
});
