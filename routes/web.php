<?php

use Illuminate\Support\Facades\Route;
use App\Http\Middleware\CheckIfFinished;
use App\Http\Middleware\CheckIfIpExists;
use App\Http\Controllers\OutputController;
use App\Http\Controllers\SurveyController;
use App\Http\Middleware\CheckIfInProgress;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\QuestionController;
use App\Http\Controllers\AssignmentController;

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
    return redirect()->route('survey.first');
});

Route::get('/1', [SurveyController::class, 'firstPart'])->name('survey.first')->middleware(CheckIfIpExists::class);
Route::post('/1', [SurveyController::class, 'submitFirst'])->name('survey.submitfirst')->middleware(CheckIfIpExists::class);
Route::get('/2', [SurveyController::class, 'secondPart'])->name('survey.second')->middleware(CheckIfInProgress::class);
Route::post('/2', [SurveyController::class, 'submitSecond'])->name('survey.submitsecond')->middleware(CheckIfInProgress::class);
Route::get('/thanks', [SurveyController::class, 'thanks'])->name('survey.end')->middleware(CheckIfFinished::class);

Route::get('admin/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/admin/questions',[QuestionController::class, 'index'])->name('questions.index');
    Route::get('/admin/questions/create',[QuestionController::class, 'create'])->name('questions.create');
    Route::get('/admin/questions/{id}',[QuestionController::class, 'show'])->name('questions.show');
    Route::post('/admin/questions',[QuestionController::class, 'store'])->name('questions.store');
    // Route::patch('/admin/questions/{id}',[QuestionController::class, 'update'])->name('questions.update');
    Route::delete('/admin/questions/{id}',[QuestionController::class, 'destroy'])->name('questions.destroy');

    Route::get('/admin/questions/{id}/add_answer',[QuestionController::class, 'create_answer'])->name('answers.create');
    Route::post('/admin/questions/{id}/add_answer',[QuestionController::class, 'add_answer'])->name('answers.store');
    Route::delete('/admin/questions/{id}/answer/{aid}',[QuestionController::class, 'delete_answer'])->name('answers.destroy');

    Route::get('/admin/assignments',[AssignmentController::class, 'index'])->name('assignments.index');
    Route::get('/admin/assignments/create',[AssignmentController::class, 'create'])->name('assignments.create');
    Route::get('/admin/assignments/{id}',[AssignmentController::class, 'show'])->name('assignments.show');
    Route::post('/admin/assignments',[AssignmentController::class, 'store'])->name('assignments.store');
    // Route::patch('/admin/assignments/{id}',[AssignmentController::class, 'update'])->name('assignments.update');
    Route::delete('/admin/assignments/{id}',[AssignmentController::class, 'destroy'])->name('assignments.destroy');

    Route::get('/admin/output',OutputController::class)->name('output.index');

    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
