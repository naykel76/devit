<?php

use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Route;

Route::middleware(['web'])->group(function () {

    if (App::environment('local')) {

        Route::get('/login-super', function () {
            Auth::loginUsingId(1);
            return redirect()->route('admin.dashboard');
        })->name('login-super');

        Route::get('/login-admin', function () {
            Auth::loginUsingId(2);
            return redirect()->route('admin.dashboard');
        })->name('login-admin');

        Route::get('/login-user', function () {
            Auth::loginUsingId(3);
            return redirect()->route('user.dashboard');
        })->name('login-user');

        Route::get('test-email', function () {
            Mail::raw('Email Test', function ($msg) {
                $msg->to(config('mail.from.address'))->subject('Test Email');
            });
            return back()->with('message', 'email success');
        })->name('test-email');
    }
});
