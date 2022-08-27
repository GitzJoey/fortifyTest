<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\DashboardController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\PermissionController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return redirect()->route('login');
});

Route::get('/home', function () {
    return redirect()->route('db');
})->name('home');

Route::group(['prefix' => 'dashboard'], function () {
    Route::get('', [DashboardController::class, 'index'])->name('db');
    Route::get('users', [UserController::class, 'index'])->name('users.index');
    Route::get('users/crud/{user:uuid?}', [UserController::class, 'crud'])->name('users.crud');
   
    Route::post('/users/save', [UserController::class, 'create'])->name('users.crud.create');
    Route::patch('/users/save', [UserController::class, 'update'])->name('users.crud.update');
    Route::delete('/users/save', [UserController::class, 'delete'])->name('users.crud.delete');

    Route::get('roles', [RoleController::class, 'index'])->name('roles.index');
    Route::get('roles/crud/{role:uuid?}', [RoleController::class, 'crud'])->name('roles.crud');
   
    Route::post('/roles/save', [RoleController::class, 'create'])->name('roles.crud.create');
    Route::patch('/roles/save', [RoleController::class, 'update'])->name('roles.crud.update');
    Route::delete('/roles/save', [RoleController::class, 'delete'])->name('roles.crud.delete');

    Route::get('permissions', [PermissionController::class, 'index'])->name('permissions.index');
    Route::get('permissions/crud/{permission:uuid?}', [PermissionController::class, 'crud'])->name('permissions.crud');

    Route::post('/permissions/save', [PermissionController::class, 'create'])->name('permissions.crud.create');
    Route::patch('/permissions/save', [PermissionController::class, 'update'])->name('permissions.crud.update');
    Route::delete('/permissions/save', [PermissionController::class, 'delete'])->name('permissions.crud.delete');
});