<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});


Route::middleware([
    'auth:web',
    config('jetstream.auth_session'),
    'verified',
])->group(function () {
    require base_path('routes/admin.php');

    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');
});

Route::get('/contact', function () {
    return view('contact.index');
})->name('contact');
Route::get('/contact', function () {
    return view('contact.index');
})->name('contact.send');
