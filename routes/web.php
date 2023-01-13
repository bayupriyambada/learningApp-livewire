<?php

use App\Http\Controllers\Administrator\Auth\LoginController;
use App\Http\Livewire\Administrator\Pages\{Dashboard, CategoriesLesson};
use App\Http\Livewire\Administrator\Pages\Routes\CheckStudentGrade;
use Illuminate\Support\Facades\Route;


Route::get('/', function () {
    return view('welcome');
})->name('login');

require 'auth/administrator.php';
require 'auth/teacher.php';
