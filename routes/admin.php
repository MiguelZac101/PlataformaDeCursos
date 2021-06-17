<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\HomeController;
use App\Http\Controllers\Admin\RoleController;

//Route::get('/', [HomeController::class,'index']);
Route::view('', 'admin.index')->name('home');
Route::resource('roles',RoleController::class)->names('roles');