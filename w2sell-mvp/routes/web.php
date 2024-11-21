<?php

use App\Http\Controllers\Api\Auth\SocialAuthController;
use Illuminate\Support\Facades\Route;


Route::get('/auth/{provider}/redirect', [SocialAuthController::class, 'redirect']);
Route::get('/auth/{provider}/callback', [SocialAuthController::class, 'callback']);

Route::get('/', function () {
    return view('agency.index');
})->name('home');

Route::get('/dashboard', function () {
    return view('welcome');
});
