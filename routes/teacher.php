<?php

use App\Http\Controllers\Chef\GroupsController;
use App\Http\Controllers\Teacher\SubjectsController;
use App\Http\Controllers\Teacher\TeacherController;
use Illuminate\Support\Facades\Route;
use Mcamara\LaravelLocalization\Facades\LaravelLocalization;

Route::group(
    [
        'prefix' => LaravelLocalization::setLocale().'/teacher',
        'middleware' => ['localeSessionRedirect', 'localizationRedirect', 'localeViewPath','teacher']
    ],
    function () {
        
    Route::get('dashboard', [TeacherController::class, 'index'])->name('teacher.dashboard');
    ######################### Begin subjects Routes ########################
    Route::group(['prefix' => 'subjects'], function () {
        Route::get('/', [SubjectsController::class, 'index'])->name('subjects.index');
        Route::get('create', [SubjectsController::class, 'create'])->name('subjects.create');
        Route::post('store', [SubjectsController::class, 'store'])->name('subjects.store');
        Route::get('show/{subject}', [SubjectsController::class, 'show'])->name('subjects.show');
        Route::get('edit/{subject}', [SubjectsController::class, 'edit'])->name('subjects.edit');
        Route::get('approve/{subject}', [SubjectsController::class, 'approve'])->name('subjects.approve');
        Route::post('update/{subject}', [SubjectsController::class, 'update'])->name('subjects.update');
        Route::get('delete/{subject}', [SubjectsController::class, 'destroy'])->name('subjects.destroy');
        Route::get('changeStatus/{subject}', [SubjectsController::class, 'changeStatus'])->name('subjects.status');
    }
    );



    Route::group(
        ['prefix' => 'groups'],
        function () {
            Route::get('/', [GroupsController::class, 'index'])->name('teacher_groups.index');
            Route::get('create', [GroupsController::class, 'create'])->name('teacher_groups.create');
            Route::post('store', [GroupsController::class, 'store'])->name('teacher_groups.store');
            Route::get('edit/{group}', [GroupsController::class, 'edit'])->name('teacher_groups.edit');
            Route::post('update/{group}', [GroupsController::class, 'update'])->name('teacher_groups.update');
            Route::get('delete/{group}', [GroupsController::class, 'destroy'])->name('teacher_groups.destroy');
            Route::get('changeStatus/{group}', [GroupsController::class, 'changeStatus'])->name('teacher_groups.status');
        }
    );
});