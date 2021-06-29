<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\HomeController;
use App\Http\Controllers\Admin\RoleController;
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\Admin\CourseController;
use App\Http\Controllers\admin\CategoriaController;

//Route::get('/', [HomeController::class,'index']);
Route::view('', 'admin.index')->middleware('can:Ver Dashboard')->name('home');
Route::resource('roles',RoleController::class)->names('roles');
Route::resource('users',UserController::class)->only(['index','edit','update'])->names('users');

Route::resource('categorias',CategoriaController::class)->names('categorias');

Route::get('courses',[CourseController::class,'index'])->name('courses.index');
//show
Route::get('courses/{course}',[CourseController::class,'show'])->name('courses.show');
//publicar
Route::post('courses/{course}/publicar',[CourseController::class,'publicar'])->name('courses.publicar');
//observado
Route::get('courses/{course}/observado',[CourseController::class,'observado'])->name('courses.observado');

Route::post('courses/{course}/reject',[CourseController::class,'reject'])->name('courses.reject');