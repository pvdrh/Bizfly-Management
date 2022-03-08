<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\EmployeeController;
use App\Http\Controllers\RoleController;

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


Route::get('/', [DashboardController::class, 'index']);

//Quản lý sản phẩm
Route::group(['prefix' => 'products'], function () {
    Route::get('/', [ProductController::class, 'index'])
        ->name('products.index');
    Route::get('/create', [ProductController::class, 'create'])
        ->name('products.create');
    Route::get('/store', [ProductController::class, 'store'])
        ->name('products.store');
});

//Quản lý nhân viên
Route::group(['prefix' => 'employees'], function () {
    Route::get('/', [EmployeeController::class, 'index'])
        ->name('employees.index');
    Route::get('/create', [EmployeeController::class, 'create'])
        ->name('employees.create');
    Route::get('/store', [EmployeeController::class, 'store'])
        ->name('employees.store');
});

//Quản lý quyền
Route::group(['prefix' => 'roles'], function () {
    Route::get('/', [RoleController::class, 'index'])
        ->name('roles.index');
    Route::get('/create', [RoleController::class, 'create'])
        ->name('roles.create');
    Route::post('/store', [RoleController::class, 'store'])
        ->name('roles.store');
});
