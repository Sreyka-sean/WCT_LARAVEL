<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('pages.home');
})->name('pages.home');

Route::get('/services', function () {
    return view('pages.service');
})->name('pages.service');

Route::get('/portfolio', function () {
    return view('pages.portfolio');
})->name('pages.portfolio');

Route::get('/about', function () {
    return view('pages.about');
})->name('pages.about');

Route::get('/team', function () {
    return view('pages.team');
})->name('pages.team');

Route::get('/testimonials', function () {
    return view('pages.testimonials');
})->name('pages.testimonials');

Route::get('/pricing', function () {
    return view('pages.pricing');
})->name('pages.pricing');

Route::get('/blog', function () {
    return view('pages.blog');
})->name('pages.blog');

Route::get('/contact', function () {
    return view('pages.contact');
})->name('pages.contact');

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
