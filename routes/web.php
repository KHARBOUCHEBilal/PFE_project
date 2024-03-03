<?php

use App\Http\Controllers\Auth\ChefLoginController;
use App\Http\Controllers\Auth\StudentsLoginController;
use App\Http\Controllers\Auth\TeachersLoginController;
use App\Http\Controllers\CkEditorController;
use App\Http\Controllers\Controller;
use App\Http\Controllers\Student\StudentController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use Mcamara\LaravelLocalization\Facades\LaravelLocalization;


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

Route::group(
    [
        'prefix' => LaravelLocalization::setLocale(),
        'middleware' => ['localeSessionRedirect', 'localizationRedirect', 'localeViewPath','web']
    ],
    function () {
        Route::get('/', [Controller::class, 'index'])->name('welcome');


        Route::get('/login-student', [StudentsLoginController::class, 'show_student_login'])->name('show_student_login');
        Route::post('/login-student', [StudentsLoginController::class, 'studentAuth'])->name('studentAuth');
        Route::get('/login-teacher', [TeachersLoginController::class, 'show_teacher_login'])->name('show_teacher_login');
        Route::post('/login-teacher', [TeachersLoginController::class, 'teacherAuth'])->name('teacherAuth');
        Route::get('/login-chef', [ChefLoginController::class, 'show_chef_login'])->name('show_chef_login');
        Route::post('/login-chef', [ChefLoginController::class, 'chefAuth'])->name('chefAuth');

        Auth::routes();

        Route::post('/upload', [CkEditorController::class, 'uploadImage'])->name('ckeditor.upload');
        Route::get('/browse', [CkEditorController::class, 'browseImage'])->name('ckeditor.browse');
        Route::get('users/export/', [StudentController::class, 'export'])->name('students.export');
    }
);
