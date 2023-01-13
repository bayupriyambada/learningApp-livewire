<?php

use App\Http\Controllers\Administrator\Auth\LoginController;
use App\Http\Livewire\Administrator\Pages\{Dashboard, CategoriesLesson};
use App\Http\Livewire\Administrator\Pages\Routes\CheckStudentGrade;
use Illuminate\Support\Facades\Route;


Route::prefix('teacher')->name('teacher.')->group(function () {

    Route::group(['middleware' => ['guest:teacher']], function () {
        Route::view('login', 'teacher.auth.login')->name('login');
    });
    Route::group(['middleware' => ['auth:teacher']], function () {
        Route::view('dashboard', 'teacher.pages.dashboard')->name('dashboard');
        Route::view('profile', 'teacher.auth.profile')->name('profile');
        Route::view('todos', 'teacher.pages.notes-app')->name('notes.app');
        Route::view('materials', 'teacher.pages.materials')->name('materials');
    });
});
