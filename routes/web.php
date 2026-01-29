<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CourseController;

Route::get('/', [CourseController::class, 'index']);
// courses routes
Route::resource('courses', CourseController::class)->only(['create', 'store', 'show', 'edit', 'update', 'destroy']);
