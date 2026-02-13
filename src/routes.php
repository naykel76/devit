<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Route;

Route::middleware(['web'])->group(function () {

    if (app()->isLocal()) {

        Route::get('/login-super', function () {
            if (! Auth::loginUsingId(1)) {
                return back()->with('error', 'Super user not found');
            }

            return back()->with('message', 'Logged in as super user');
        })->name('login-super');

        Route::get('/login-admin', function () {
            if (! Auth::loginUsingId(2)) {
                return back()->with('error', 'Admin user not found');
            }

            return back()->with('message', 'Logged in as admin user');
        })->name('login-admin');

        Route::get('/login-user', function () {
            if (! Auth::loginUsingId(3)) {
                return back()->with('error', 'User not found');
            }

            return redirect()->route('user.dashboard')->with('message', 'Logged in as user');
        })->name('login-user');

        Route::get('/login-user2', function () {
            if (! Auth::loginUsingId(4)) {
                return back()->with('error', 'User2 not found');
            }

            return back()->with('message', 'Logged in as user2');
        })->name('login-user2');

        Route::get('test-email', function () {
            try {
                $fromAddress = config('mail.from.address');

                if (! $fromAddress) {
                    return back()->with('error', 'Mail from address not configured');
                }

                Mail::raw('Email Test', function ($msg) use ($fromAddress) {
                    $msg->to($fromAddress)->subject('Test Email');
                });

                return back()->with('message', 'Test email sent successfully');
            } catch (\Exception $e) {
                return back()->with('error', 'Failed to send email: ' . $e->getMessage());
            }
        })->name('test-email');
    }
});
