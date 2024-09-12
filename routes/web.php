<?php

use App\Http\Controllers\DepartmentController;
use App\Http\Controllers\LangController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\StudentController;
use App\Http\Controllers\SubjectController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/
Route::get('/', function () {return view('auth.login');});

Auth::routes(['verify'=>true,]);

Route::middleware(['auth', 'verified'])->group(function (){

    Route::get('lang/{locale}', [LangController::class, 'changeLanguage'])->middleware('language');

    Route::resource('departments', DepartmentController::class);
    
    Route::resource('subjects', SubjectController::class);
    
    Route::resource('students', StudentController::class);
    
    Route::get('profile/{id}', [ProfileController::class, 'index'])->name('students.profile');

    Route::get('register-subject', [ProfileController::class, 'showRegisterSubjects'])->name('students.registerSubject');

    Route::post('register-subject/{id}', [ProfileController::class, 'registerSubjects'])->name('students.registerSubjects');

    Route::post('register-list-subject', [ProfileController::class, 'registerListSubjects'])->name('students.registerListSubjects');

    Route::post('unregister-subject/{id}', [ProfileController::class, 'unRegisterSubjects'])->name('students.unRegisterSubjects');

    Route::post('update-score/{id}', [ProfileController::class, 'updateScore'])->name('students.updateScore');

});

