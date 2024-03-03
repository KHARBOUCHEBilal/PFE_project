<?php

use App\Http\Controllers\Student\GroupController;
use App\Http\Controllers\Student\StudentController;
use App\Http\Controllers\Teacher\SubjectsController;
use Illuminate\Support\Facades\Route;
use Mcamara\LaravelLocalization\Facades\LaravelLocalization;

Route::group(
    [
        'prefix' => LaravelLocalization::setLocale().'/student',
        'middleware' => ['localeSessionRedirect', 'localizationRedirect', 'localeViewPath','student']
    ],
    function () {

            Route::get('dashboard', [StudentController::class, 'index'])->name('student.dashboard');

            ######################### Begin groups Routes ########################
            Route::group(
                ['prefix' => 'group'],
                function () {
                    Route::get('/', [GroupController::class, 'index'])->name('group.my_groupe');
                    Route::get('create', [GroupController::class, 'create'])->name('group.create');
                    Route::post('store', [GroupController::class, 'store'])->name('group.store');
                    Route::get('edit/{group}', [GroupController::class, 'edit'])->name('group.edit');
                    Route::get('approve/{group}', [GroupController::class, 'approve'])->name('group.approve');
                    Route::get('show/{group}', [GroupController::class, 'show'])->name('group.show');
                    Route::post('update/{group}', [GroupController::class, 'update'])->name('group.update');
                    Route::get('delete/{group}', [GroupController::class, 'destroy'])->name('group.destroy');
                }
            );
            
            Route::group(
                ['prefix' => 's_students'],
                function () {
                    Route::get('/', [SubjectsController::class, 'index'])->name('students_subjects.index');
                    Route::get('show/{subject}', [SubjectsController::class, 'show'])->name('students_subjects.show');
                    Route::get('approve/{subject}', [SubjectsController::class, 'approve'])->name('students_subjects.approve');
                    Route::post('update/{subject}', [SubjectsController::class, 'update'])->name('students_subjects.update');
                    Route::get('delete/{subject}', [SubjectsController::class, 'destroy'])->name('students_subjects.destroy');
                    Route::get('changeStatus/{subject}', [SubjectsController::class, 'changeStatus'])->name('students_subjects.status');
                }
            );
        }
);