<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\FeatureController;
use App\Http\Controllers\HomeController;

// Static Pages Routes
Route::group([], function () {
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
});

// Feature Management Routes
Route::group(['prefix' => 'backend', 'as' => 'Feature_views.'], function () {
    Route::get('/', [FeatureController::class, 'index'])->name('index'); // List all features
    Route::get('/create', [FeatureController::class, 'create'])->name('Create'); // Show create form
    Route::post('/', [FeatureController::class, 'store'])->name('store'); // Store new feature
    Route::get('/{feature}/edit', [FeatureController::class, 'edit'])->name('Edit'); // Show edit form
    Route::put('/{feature}/update', [FeatureController::class, 'update'])->name('update'); // Update feature
    Route::delete('/{feature}/destroy', [FeatureController::class, 'destroy'])->name('destroy'); // Delete feature
    Route::get('/services', [FeatureController::class, 'showFeatures'])->name('pages.service');
    });
// Home Route
Route::get('/home', [HomeController::class, 'index'])->name('home');