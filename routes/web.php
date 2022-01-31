<?php

use App\Http\Controllers\coursesController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\semcontroller;
use App\Http\Controllers\SubjectController;
use App\Http\Controllers\TeacherInfoController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

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
Route::get('admin/home', [HomeController::class, 'adminHome'])->name('admin.home')->middleware('is_admin');
Route::get('teacher/home', [HomeController::class, 'teacherHome'])->name('teacher.home')->middleware('is_teacher');
Route::get('student/home', [HomeController::class, 'studentHome'])->name('student.home')->middleware('is_student');
Route::get('/', function () {
    return view('welcome');
});

Route::resource('course', coursesController::class)->middleware('is_admin');
Route::resource('sem', semcontroller::class)->middleware('is_admin');
Route::resource('subject', SubjectController::class)->middleware('is_admin');
Route::post('/getsem', [SubjectController::class, 'getsem']);
Route::resource('teacherInfo', TeacherInfoController::class);


Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
