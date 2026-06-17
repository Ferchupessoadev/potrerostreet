<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\AuthController;
use Illuminate\Foundation\Auth\EmailVerificationRequest;


Route::middleware('guest')->group(function (){
    Route::get('/login', fn() => view('auth.login.index'))
        ->name('auth.login');
    Route::post('/login', [AuthController::class, 'login'])
        ->name('login');

    Route::get('/register', fn() => view('auth.register.index'))
        ->name('auth.register');
    Route::post('/register', [AuthController::class, 'register'])
        ->name('register');

    Route::get('/auth/{provider}/redirect', [AuthController::class, 'redirectToProvider'])
        ->name('auth.redirect');
    Route::get('/auth/{provider}/callback', [AuthController::class, 'handleProviderCallback']);
});

Route::post('/logout', [AuthController::class, 'logout'])
    ->middleware('auth')
    ->name('logout');

Route::middleware('auth')->group(function (){
    Route::view('/email/verify', 'auth.verify-email')
        ->name('verification.notice');

    Route::get('/email/verify/{id}/{hash}', function (EmailVerificationRequest $request) {
        $request->fulfill();
        return redirect('/dashboard');
    })->middleware('signed')->name('verification.verify');

    Route::post('/email/verification-notification', function (Request $request) {
        $request->user()->sendEmailVerificationNotification();
        return back()->with('message', '¡Enlace de verificación enviado!');
    })->middleware('throttle:6,1')->name('verification.send');
});



