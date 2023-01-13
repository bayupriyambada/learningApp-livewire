<?php

use App\Http\Controllers\Administrator\Auth\LoginController;
use App\Http\Livewire\Administrator\Pages\{Dashboard, CategoriesLesson};
use App\Http\Livewire\Administrator\Pages\Routes\CheckStudentGrade;
use Illuminate\Support\Facades\Route;


Route::prefix('administrator')->name('administrator.')->group(function () {

    Route::group(['middleware' => ['guest:administrator']], function () {
        Route::get('login', [LoginController::class, 'login'])->name('login');
    });
    Route::group(['middleware' => ['auth:administrator']], function () {
        Route::view('monitoring', 'administrator.pages.dashboard')->name('dashboard');
        Route::view('school-year', 'administrator.pages.schoolYear')->name('school.year');


        Route::prefix('learning')->group(
            function () {
                Route::view('categories-lesson', 'administrator.pages.categoriesLesson')->name('categories.lesson');
                Route::view('grade-level', 'administrator.pages.gradeLevel')->name('grade.level');
                Route::get('grade-level/{id}', CheckStudentGrade::class)->name('grade.level.students');
            }
        );
        Route::prefix('users')->group(
            function () {
                Route::view('teachers', 'administrator.pages.teacher')->name('teacher');
                Route::view('students', 'administrator.pages.student')->name('student');
            }
        );
    });
});
