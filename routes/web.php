<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\HomeController;

// Home routes
Route::get('/', [HomeController::class, 'index'])->name('root');
Route::get('/login', [HomeController::class, 'index'])->name('login');
Route::get('/osa', [HomeController::class, 'osa'])->name('osa');
Route::get('/tos', [HomeController::class, 'tos'])->name('tos');

// Authentication routes
Route::get('/signout', 'AuthController@signout')->name('signout');
Route::post('/signin', 'AuthController@signin')->name('signin');
Route::get('/register', 'AuthController@register')->name('register');
Route::get('/reset', 'AuthController@reset')->name('password.request');
