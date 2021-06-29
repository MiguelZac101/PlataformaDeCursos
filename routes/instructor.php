<?php

use Illuminate\Support\Facades\Route;
//use App\Http\Livewire\InstructorCourses;
use App\Http\Controllers\Instructor\CourseController;

use App\Http\Livewire\Instructor\CoursesCurriculum;

use App\Http\Livewire\Instructor\CoursesStudents;

//redirigir ruta
Route::redirect('', 'instructor/courses');
//middleware restrige ruta por permiso can:nombrepermiso
//Route::get('courses', InstructorCourses::class)->middleware('can:Leer Cursos')->name('courses.index');
Route::resource('courses', CourseController::class)->names('courses');

Route::get('courses/{course}/curriculum',CoursesCurriculum::class)->middleware('can:Actualizar Cursos')->name('courses.curriculum');

Route::get('courses/{course}/goals',[CourseController::class,'goals'])->name('courses.goals');

Route::get('courses/{course}/students',CoursesStudents::class)->middleware('can:Actualizar Cursos')->name('courses.students');
//solicitar revisión de curso
Route::post('courses/{course}/status',[CourseController::class,'status'])->name('courses.status');
//observacion de curso
Route::get('courses/{course}/observacion',[CourseController::class,'observacion'])->name('courses.observacion');