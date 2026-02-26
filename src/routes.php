<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Route;

Route::middleware(['web'])->group(function () {

    if (app()->isLocal()) {

        $userIds = config('devit.user_ids', []);

        if ($id = $userIds['super'] ?? null) {
            Route::get('/login-super', function () use ($id) {
                if (! Auth::loginUsingId($id)) {
                    return back()->with('error', 'Super user not found');
                }

                return back()->with('message', 'Logged in as super user');
            })->name('login-super');
        }

        if ($id = $userIds['admin'] ?? null) {
            Route::get('/login-admin', function () use ($id) {
                if (! Auth::loginUsingId($id)) {
                    return back()->with('error', 'Admin user not found');
                }

                return back()->with('message', 'Logged in as admin user');
            })->name('login-admin');
        }

        if ($id = $userIds['user'] ?? null) {
            Route::get('/login-user', function () use ($id) {
                if (! Auth::loginUsingId($id)) {
                    return back()->with('error', 'User not found');
                }

                $redirectRoute = config('devit.redirect_after_login_user');

                if ($redirectRoute && Route::has($redirectRoute)) {
                    return redirect()->route($redirectRoute)->with('message', 'Logged in as user');
                }

                return back()->with('message', 'Logged in as user');
            })->name('login-user');
        }

        if ($id = $userIds['user2'] ?? null) {
            Route::get('/login-user2', function () use ($id) {
                if (! Auth::loginUsingId($id)) {
                    return back()->with('error', 'User2 not found');
                }

                return back()->with('message', 'Logged in as user2');
            })->name('login-user2');
        }

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
