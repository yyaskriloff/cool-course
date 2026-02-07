<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CourseController;
use App\Http\Controllers\ContentController;
use App\Http\Controllers\Auth\Register;
use App\Http\Controllers\Auth\Login;
use App\Http\Controllers\Auth\Logout;
use App\Models\Course;
use Inertia\Inertia;


Route::get('/', function () {
    
    $courses = Course::get();

    return Inertia::render('Home', ['courses' => $courses]);
})->name('home');
// courses routes

Route::middleware('auth')->group(function () {
    Route::resource('courses', CourseController::class);
    Route::resource('courses/{course}/content', ContentController::class)->only(['create', 'store', 'show', 'edit', 'update', 'destroy']);
});


// Auth
Route::get('/register', function () {
    return Inertia::render('Auth/Register');
})->name('register');
Route::post('/register', Register::class);
Route::get('/login', function () {
    return Inertia::render('Auth/Login');
})->name('login');
Route::post('/login', Login::class);
Route::post('/logout', Logout::class);