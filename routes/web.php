<?php

use App\Http\Controllers\UserController;
use App\Http\Controllers\UserManagerController;
use App\Http\Controllers\UsersManageController;
use App\Http\Controllers\VideosController;
use App\Http\Controllers\VideosManagerController;
use Illuminate\Support\Facades\Route;

Route::get('/videos/{id}', [VideosController::class, 'show'])->name('videos.show');
Route::get('/', [VideosController::class, 'index'])->name('home');


Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
])->group(function () {
    Route::middleware(['auth', 'can:video_manager'])->group(function () {
        Route::get('/manage', [VideosManagerController::class, 'index'])->name('videos.manage.index');
        Route::get('/manage/create', [VideosManagerController::class, 'create'])->name('videos.manage.create');
        Route::post('/manage', [VideosManagerController::class, 'store'])->name('videos.manage.store');
        Route::get('/manage/{id}/edit', [VideosManagerController::class, 'edit'])->name('videos.manage.edit');
        Route::put('/manage/{id}', [VideosManagerController::class, 'update'])->name('videos.manage.update');
        Route::get('/manage/{id}/delete', [VideosManagerController::class, 'delete'])->name('videos.manage.delete');
        Route::delete('/manage/{id}', [VideosManagerController::class, 'destroy'])->name('videos.manage.destroy');
    });
});

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
])->group(function () {
    Route::middleware(['auth'])->group(function () {
        Route::get('/users/manage', [UserController::class, 'index'])->name('users.manage.index');
        Route::get('/showuser/{id}', [UserController::class, 'show'])->name('users.show');
    });
});


Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
])->group(function () {
    Route::middleware(['auth', 'can:super_admin'])->group(function () {
        Route::get('/users/manage/create', [UserManagerController::class, 'create'])->name('users.manage.create');
        Route::post('/users/manage', [UserManagerController::class, 'store'])->name('users.manage.store');
        Route::get('/users/manage/{id}/edit', [UserManagerController::class, 'edit'])->name('users.manage.edit');
        Route::put('/users/manage/{id}', [UserManagerController::class, 'update'])->name('users.manage.update');
        Route::get('/users/manage/{id}/delete', [UserManagerController::class, 'delete'])->name('users.manage.delete');
        Route::delete('/users/manage/{id}', [UserManagerController::class, 'destroy'])->name('users.manage.destroy');
    });
});

