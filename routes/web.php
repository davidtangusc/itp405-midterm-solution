<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\URL;
use App\Http\Controllers\QuestionController;
use App\Http\Controllers\AnswerController;

Route::get('/', [QuestionController::class, 'index'])->name('question.index');
Route::get('/questions/{question}', [QuestionController::class, 'show'])->name('question.show');
Route::post('/questions', [QuestionController::class, 'store'])->name('question.store');
Route::post('/questions/{question}/answers', [AnswerController::class, 'store'])->name('answer.store');

if (env('APP_ENV') !== 'local') {
    URL::forceScheme('https');
}