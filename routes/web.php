<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DepartmentController;
use App\Http\Controllers\SubjectController;
use App\Http\Controllers\PaperController;
use App\Http\Controllers\QuestionController;
use App\Http\Controllers\StudentController;
use App\Http\Controllers\AnswerController;
use App\Http\Controllers\TeacherController;
use Illuminate\Support\Facades\Gate;

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
    return view('welcome');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::middleware(['can:access-departments'])->group(function () {
    Route::get('/departments', [DepartmentController::class, 'index'])->name('departments.index');
    Route::get('/departments/create', [DepartmentController::class, 'create'])->name('departments.create');
    Route::post('/departments/store', [DepartmentController::class, 'store'])->name('departments.store');
});

Route::middleware(['can:access-subjects'])->group(function () {
    Route::get('/subjects', [SubjectController::class, 'index'])->name('subjects.index');
    Route::get('/subjects/create', [SubjectController::class, 'create'])->name('subjects.create');
    Route::post('/subjects/store', [SubjectController::class, 'store'])->name('subjects.store');
});


Route::middleware(['can:access-papers'])->group(function () {
Route::get('/papers/create', [PaperController::class, 'create'])->name('papers.create');
Route::post('/papers/store', [PaperController::class, 'store'])->name('papers.store');
});


Route::middleware(['can:access-questions'])->group(function () {
Route::get('/questions/create', [QuestionController::class, 'create'])->name('questions.create');
Route::post('/questions', [QuestionController::class, 'store'])->name('questions.store');



    Route::get('/teacher/papers', [TeacherController::class, 'viewPapers'])->name('teacher.viewPapers');

});





Route::get('/student/select-subject', [StudentController::class, 'selectSubject'])->name('student.selectSubject');
Route::any('/student/view-questions', [StudentController::class, 'viewQuestions'])->name('student.viewQuestions');



Route::post('/answers/store', [AnswerController::class, 'store'])->name('answers.store');



