<?php

use Illuminate\Support\Facades\Route;
use App\Http\Livewire\InstructorCourses;

//redirigir ruta
Route::redirect('', 'instructor/courses');

Route::get('courses', InstructorCourses::class)->name('courses.index');