<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\HomeController;
use App\Http\Controllers\Admin\RoleController;
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\Admin\CourseController;

//Route::get('/', [HomeController::class,'index']);
Route::view('', 'admin.index')->middleware('can:Ver Dashboard')->name('home');
Route::resource('roles',RoleController::class)->names('roles');
Route::resource('users',UserController::class)->only(['index','edit','update'])->names('users');

Route::get('courses',[CourseController::class,'index'])->name('courses.index');