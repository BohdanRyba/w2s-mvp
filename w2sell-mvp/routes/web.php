<?php

use App\Http\Controllers\Api\Auth\SocialAuthController;
use Illuminate\Support\Facades\Route;


Route::get('/auth/{provider}/redirect', [SocialAuthController::class, 'redirect']);
Route::get('/auth/{provider}/callback', [SocialAuthController::class, 'callback']);

Route::get('/', function () {
    return view('agency.index');
})->name('agency.index');

Route::get('/about', function () {
    return view('agency.about');
})->name('agency.about');

Route::get('/contact', function () {
    return view('agency.contact');
})->name('agency.contact');

Route::get('/expertise', function () {
    return view('agency.expertise');
})->name('agency.expertise');

Route::get('/expertise/{service}', function () {
    return view('agency.expertise');
})->name('agency.expertise.service');

Route::get('/projects', function () {
    return view('agency.projects');
})->name('agency.projects');

Route::get('/people', function () {
    return view('agency.people');
})->name('agency.people');

Route::get('/blog', function () {
    return view('agency.blog.index');
})->name('agency.blog');


//
//Route::get('/dashboard', function () {
//    return view('welcome');
//});
