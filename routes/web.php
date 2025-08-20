<?php

use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\HomeController;
use App\Http\Controllers\AuthController;

// Set some common variables for the application.
$request = Request::capture();

$protocol = ($request->secure()) ? 'https:' : 'http:';

$host = $request->server('HTTP_HOST');

$hostFull = $protocol.'//'.$host;

if (Auth::check()) {
    $authUser = Auth::user();
} else {
    $authUser = null;
}

View::share('serverUrl', $hostFull);
View::share('authUser', $authUser);

// Home routes
Route::get('/', [HomeController::class, 'index'])->name('root');
Route::get('/login', [HomeController::class, 'index'])->name('login');
Route::get('/osa', [HomeController::class, 'osa'])->name('osa')->middleware('auth');

// Authentication routes
Route::get('/signout', [ AuthController::class, 'signout'])->name('signout');
Route::post('/signin', [ AuthController::class, 'signin'])->name('signin');
Route::get('/register', [ AuthController::class, 'register'])->name('register');
Route::get('/reset', [ AuthController::class, 'reset'])->name('password.request');

# Stub routes for user management
Route::get('/user/{user}', [UserController::class, 'show'])->name('user.show')->middleware('auth');
Route::post('/user/tos', 'UserController@tos')->name('tos')->middleware('auth');
