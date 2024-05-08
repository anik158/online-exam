<?php

use App\Http\Controllers\CandidateExamController;
use App\Http\Controllers\ExamController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\QuestionController;
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
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

//Question Controller
Route::get('/questions', [QuestionController::class, 'index'])->name('questions.index');
Route::get('/questions/create', [QuestionController::class, 'create'])->name('questions.create');
Route::post('/questions', [QuestionController::class, 'store'])->name('questions.store');

//Exams Controller
Route::get('exams/create', [ExamController::class, 'create'])->name('exams.create');
Route::post('exams', [ExamController::class, 'store'])->name('exams.store');
Route::get('exams', [ExamController::class, 'index'])->name('exams.exam-list');

//Candidate Controller
Route::get('candidates/{examId}/takes-exam', [CandidateExamController::class, 'takesExam'])->name('candidates.takes-exam');
Route::post('candidates/{examId}', [CandidateExamController::class, 'store'])->name('candidates.exam_store');



require __DIR__.'/auth.php';
