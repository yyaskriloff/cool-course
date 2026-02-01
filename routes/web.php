<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CourseController;
use App\Http\Controllers\ContentController;

Route::get('/', [CourseController::class, 'index']);
// courses routes
Route::resource('courses', CourseController::class)->only(['create', 'store', 'show', 'edit', 'update', 'destroy']);
Route::resource('courses/{course}/content', ContentController::class)->only(['create', 'store', 'show', 'edit', 'update', 'destroy']);