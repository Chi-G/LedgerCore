<?php

use Illuminate\Support\Facades\Route;
use Inertia\Inertia;
use App\Http\Controllers\ContactController;

Route::get('/', function () {
    return Inertia::render('Welcome');
});


Route::get('/services', function () {
    return Inertia::render('Services/index');
});

Route::get('/portfolio', function () {
    return Inertia::render('Portfolio/index');
});

Route::get('/about', function () {
    return Inertia::render('About/index');
});

Route::get('/client', function () {
    return Inertia::render('Client/index');
});

Route::get('/contact', function () {
    return Inertia::render('Contact/index');
});

Route::post('/contact', [ContactController::class, 'store'])->name('contact.store');

Route::fallback(function () {
    return Inertia::render('ErrorHandler')
        ->withViewData(['title' => 'Page Not Found'])
        ->setStatusCode(404);
});
