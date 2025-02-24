<?php

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

