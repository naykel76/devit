<?php

use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Route;

Route::middleware(['web'])->group(function () {

    if (App::environment('local')) {

        Route::get('/login-super', function () {
            Auth::loginUsingId(1);
            return back();
        })->name('login-super');

        Route::get('/login-user', function () {
            $uid = \App\Models\User::whereName('Jimmy Peters')->pluck('id');
            Auth::loginUsingId($uid);
            return back();
        })->name('login-user');

        Route::view('dev', 'dev')->name('dev');

        Route::get('test-email', function () {
            Mail::raw('Email Test', function ($msg) {
                $msg->to(config('mail.from.address'))->subject('Test Email');
            });
            return back()->with('message', 'email success');
        })->name('test-email');
    }
});
