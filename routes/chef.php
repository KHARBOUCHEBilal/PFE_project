<?php

use App\Http\Controllers\Chef\CategoryController;
use App\Http\Controllers\Chef\ChefController;
use App\Http\Controllers\Chef\GroupsController;
use App\Http\Controllers\Chef\ModelsController;
use App\Http\Controllers\Chef\ModulesNotesController;
use App\Http\Controllers\Chef\SemesterNotesController;
use App\Http\Controllers\Chef\SettingsController;
use App\Http\Controllers\Chef\StudentsController;
use App\Http\Controllers\Chef\TeachersController;
use App\Http\Controllers\Teacher\SubjectsController;
use Illuminate\Support\Facades\Route;
use Mcamara\LaravelLocalization\Facades\LaravelLocalization;

Route::group(
    [
        'prefix' => LaravelLocalization::setLocale() . '/chef',
        'middleware' => ['localeSessionRedirect', 'localizationRedirect', 'localeViewPath', 'chef']
    ],
    function () {


        Route::resource('categories', CategoryController::class);


        Route::get('dashboard', [ChefController::class, 'index'])->name('chef.dashboard');

        Route::get('reset-password', [ChefController::class, 'reset_password'])->name('reset-password');
        Route::post('store-password', [ChefController::class, 'store_password'])->name('store-password');
        Route::group(['prefix' => 'models'], function () {
            Route::get('/', [ModelsController::class, 'index'])->name('models.index');
            Route::get('create', [ModelsController::class, 'create'])->name('models.create');
            Route::post('store', [ModelsController::class, 'store'])->name('models.store');
            Route::get('edit/{model}', [ModelsController::class, 'edit'])->name('models.edit');
            Route::post('update/{model}', [ModelsController::class, 'update'])->name('models.update');
            Route::get('delete/{model}', [ModelsController::class, 'destroy'])->name('models.destroy');
            Route::get('changeStatus/{model}', [ModelsController::class, 'changeStatus'])->name('models.status');
        });

        ######################### Begin Categories Routes ########################
        Route::group(['prefix' => 'categories'], function () {
            Route::get('/', [CategoryController::class, 'index'])->name('categories.index');
            Route::get('create', [CategoryController::class, 'create'])->name('categories.create');
            Route::post('store', [CategoryController::class, 'store'])->name('categories.store');
            Route::get('edit/{category}', [CategoryController::class, 'edit'])->name('categories.edit');
            Route::post('update/{category}', [CategoryController::class, 'update'])->name('categories.update');
            Route::get('delete/{category}', [CategoryController::class, 'destroy'])->name('categories.destroy');
            Route::get('changeStatus/{category}', [CategoryController::class, 'changeStatus'])->name('categories.status');
        });

        ##################################  Start Settings Routes ######################################
        Route::group(['prefix' => 'settings'], function () {
            Route::post('students_dashboard_update', [SettingsController::class, 'students_dashboard_update'])->name('students.dashboard_update');
            Route::post('teachers_dashboard_update', [SettingsController::class, 'teachers_dashboard_update'])->name('teachers.dashboard_update');
        });

        Route::group(
            ['prefix' => 'groups'],
            function () {
                Route::get('/', [GroupsController::class, 'index'])->name('groups.index');
                Route::get('filtred_groupes', [GroupsController::class, 'filtred_groupes'])->name('groups.filtred_groupes');
                Route::get('filtred_groupes/delete-all', [GroupsController::class, 'delete_all_filtred_groups'])->name('groups.delete-all-filtred-groups');
                Route::get('create', [GroupsController::class, 'create'])->name('groups.create');
                Route::get('show-finale-list', [GroupsController::class, 'show_finale_list'])->name('groups.show-finale-list');
                Route::get('finale-list', [GroupsController::class, 'finale_list'])->name('groups.finale-list');
                Route::post('store', [GroupsController::class, 'store'])->name('groups.store');
                Route::get('edit/{group}', [GroupsController::class, 'edit'])->name('groups.edit');
                Route::post('update/{group}', [GroupsController::class, 'update'])->name('groups.update');
                Route::get('delete/{group}', [GroupsController::class, 'destroy'])->name('groups.destroy');
                Route::get('delete-all', [GroupsController::class, 'delete_all'])->name('groups.delete-all');
                Route::get('changeStatus/{group}', [GroupsController::class, 'changeStatus'])->name('groups.status');
            }
        );

        Route::group(
            ['prefix' => 'modules_notes'],
            function () {
                Route::get('/', [ModulesNotesController::class, 'index'])->name('modules_notes.index');
                Route::get('create', [ModulesNotesController::class, 'create'])->name('modules_notes.create');
                Route::post('store', [ModulesNotesController::class, 'store'])->name('modules_notes.store');
                Route::get('edit/{modules_note}', [ModulesNotesController::class, 'edit'])->name('modules_notes.edit');
                Route::post('update/{modules_note}', [ModulesNotesController::class, 'update'])->name('modules_notes.update');
                Route::get('delete/{modules_note}', [ModulesNotesController::class, 'destroy'])->name('modules_notes.destroy');
                Route::get('/file-import', [ModulesNotesController::class, 'importView'])->name('modules_notes.import-view');
                Route::post('/import', [ModulesNotesController::class, 'import'])->name('modules_notes.import');
            }
        );

        Route::group(
            ['prefix' => 'semester_notes'],
            function () {
                Route::get('/', [SemesterNotesController::class, 'index'])->name('semester_notes.index');
                Route::get('create', [SemesterNotesController::class, 'create'])->name('semester_notes.create');
                Route::post('store', [SemesterNotesController::class, 'store'])->name('semester_notes.store');
                Route::get('edit/{semester_note}', [SemesterNotesController::class, 'edit'])->name('semester_notes.edit');
                Route::post('update/{semester_note}', [SemesterNotesController::class, 'update'])->name('semester_notes.update');
                Route::get('delete/{semester_note}', [SemesterNotesController::class, 'destroy'])->name('semester_notes.destroy');
                Route::get('/file-import', [SemesterNotesController::class, 'importView'])->name('semester_notes.import-view');
                Route::post('/import', [SemesterNotesController::class, 'import'])->name('semester_notes.import');
            }
        );


        Route::group(
            ['prefix' => 'students'],
            function () {
                Route::get('/', [StudentsController::class, 'index'])->name('students.index');
                Route::get('create', [StudentsController::class, 'create'])->name('students.create');
                Route::post('store', [StudentsController::class, 'store'])->name('students.store');
                Route::get('edit/{student}', [StudentsController::class, 'edit'])->name('students.edit');
                Route::post('update/{student}', [StudentsController::class, 'update'])->name('students.update');
                Route::get('delete/{student}', [StudentsController::class, 'destroy'])->name('students.destroy');
                Route::get('delete-all', [StudentsController::class, 'delete_all'])->name('students.delete-all');
                Route::get('/file-import', [StudentsController::class, 'importView'])->name('students.import-view');
                Route::post('/import', [StudentsController::class, 'import'])->name('students.import');
            }
        );

        Route::group(
            ['prefix' => 'teachers'],
            function () {
                Route::get('/', [TeachersController::class, 'index'])->name('teachers.index');
                Route::get('create', [TeachersController::class, 'create'])->name('teachers.create');
                Route::post('store', [TeachersController::class, 'store'])->name('teachers.store');
                Route::get('edit/{teacher}', [TeachersController::class, 'edit'])->name('teachers.edit');
                Route::post('update/{teacher}', [TeachersController::class, 'update'])->name('teachers.update');
                Route::get('delete/{teacher}', [TeachersController::class, 'destroy'])->name('teachers.destroy');
                Route::get('delete-all', [TeachersController::class, 'delete_all'])->name('teachers.delete-all');
                Route::get('/file-import', [TeachersController::class, 'importView'])->name('teachers.import-view');
                Route::post('/import', [TeachersController::class, 'import'])->name('teachers.import');
            }
        );


        Route::group(
            ['prefix' => 'chef_students'],
            function () {
                Route::get('/', [SubjectsController::class, 'index'])->name('chef_subjects.index');
                Route::get('show/{subject}', [SubjectsController::class, 'show'])->name('chef_subjects.show');
                Route::post('update/{subject}', [SubjectsController::class, 'update'])->name('chef_subjects.update');
                Route::get('approve/{subject}', [SubjectsController::class, 'approve'])->name('chef_subjects.approve');
                Route::get('delete/{subject}', [SubjectsController::class, 'destroy'])->name('chef_subjects.destroy');
            }
        );

        Route::get('/filter_groups', [ChefController::class, 'filter_groups'])->name('filter_groups');
    }
);
