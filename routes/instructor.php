<?php

use Illuminate\Support\Facades\Route;
use App\Http\Livewire\InstructorCourses;

//redirigir ruta
Route::redirect('', 'instructor/courses');
//middleware restrige ruta por permiso can:nombrepermiso
Route::get('courses', InstructorCourses::class)->middleware('can:Leer Cursos')->name('courses.index');