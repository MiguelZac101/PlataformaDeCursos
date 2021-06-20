<?php

use Illuminate\Support\Facades\Route;
//use App\Http\Livewire\InstructorCourses;
use App\Http\Controllers\Instructor\CourseController;

use App\Http\Livewire\Instructor\CoursesCurriculum;

//redirigir ruta
Route::redirect('', 'instructor/courses');
//middleware restrige ruta por permiso can:nombrepermiso
//Route::get('courses', InstructorCourses::class)->middleware('can:Leer Cursos')->name('courses.index');
Route::resource('courses', CourseController::class)->names('courses');

Route::get('courses/{course}/curriculum',CoursesCurriculum::class)->name('courses.curriculum');