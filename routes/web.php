<?php

use Inertia\Inertia;
use Illuminate\Support\Facades\Route;
use Illuminate\Foundation\Application;
use App\Http\Controllers\ProjectController;
use App\Http\Controllers\WelcomeController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\ProjectBoardController;
use App\Http\Controllers\RequestPermissionController;

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

/*Public Url*/
Route::get('/',[WelcomeController::class,'index'])->name('home');
Route::resource('/project-board',ProjectBoardController::class);

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
])->group(function () {
    Route::get('/dashboard', function () {
        return Inertia::render('Dashboard');
    })->name('dashboard');

    Route::resource('/projects',ProjectController::class);
    Route::resource('/category',CategoryController::class);

    // Request
    Route::get('/request',[RequestPermissionController::class,'index'])->name('request.index');
    Route::get('/request/{id}',[RequestPermissionController::class,'create'])->name('request.create');
    Route::post('/request/{project_id}/{author_id}',[RequestPermissionController::class,'store'])->name('request.store');
});
