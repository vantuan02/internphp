<?php

use App\Http\Controllers\DepartmentController;
use App\Http\Controllers\LangController;
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

Route::get('/', function () {
    return view('auth.login');
});

Auth::routes();

Route::middleware(['auth'])->group(function () {
    Route::get('/students/export', [StudentController::class, 'export'])->name('students.export');

    Route::post('/students/import', [StudentController::class, 'import'])->name('students.import');
    
    Route::get('lang/{locale}', [LangController::class, 'changeLanguage'])->middleware('language');

    Route::resource('departments', DepartmentController::class);

    Route::resource('subjects', SubjectController::class);

    Route::resource('students', StudentController::class);

    Route::resource('students', StudentController::class)->except(['show']);

    Route::get('profile/{id}', [StudentController::class, 'detail'])->name('students.profile');

    Route::get('scoreTable', [StudentController::class, 'scoreTable'])->name('students.table');

    Route::get('show-register-subject', [StudentController::class, 'showRegisterSubject'])->name('students.registerSubject');

    Route::post('register-subject/{id}', [StudentController::class, 'registerSubject'])->name('students.registerSubjects');

    Route::post('register-more-subject', [StudentController::class, 'registerMoreSubject'])->name('students.moreSubjects');

    Route::post('unregister-subject/{id}', [StudentController::class, 'unRegisterSubject'])->name('students.unRegisterSubjects');

    Route::post('update-score/{id}', [StudentController::class, 'updateScore'])->name('students.updateScore');

});