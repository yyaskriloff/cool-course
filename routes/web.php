<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CourseController;
use App\Http\Controllers\ContentController;
use App\Http\Controllers\Auth\Register;
use App\Http\Controllers\Auth\Login;
use App\Http\Controllers\Auth\Logout;
use App\Models\Course;

Route::get('/', function () {
    $courses = Course::get();
    return view('home', ['courses' => $courses]);
})->name('home');
// courses routes

Route::middleware('auth')->group(function () {
    Route::resource('courses', CourseController::class);
    Route::resource('courses/{course}/content', ContentController::class)->only(['create', 'store', 'show', 'edit', 'update', 'destroy']);
});


// Auth
Route::view('/register', 'auth.register')->name('register');
Route::post('/register', Register::class);
Route::view('/login', 'auth.login')->name('login');
Route::post('/login', Login::class);
Route::post('/logout', Logout::class);