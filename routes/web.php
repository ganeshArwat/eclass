<?php

use App\Http\Controllers\coursesController;
use App\Http\Controllers\semcontroller;
use App\Http\Controllers\SubjectController;
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

Route::get('/', function () {
    return view('welcome');
});

Route::resource('course', coursesController::class);
Route::resource('sem', semcontroller::class);
Route::resource('subject', SubjectController::class);
Route::post('/getsem', [SubjectController::class, 'getsem']);

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
