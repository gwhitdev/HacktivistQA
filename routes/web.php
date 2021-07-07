<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\QuestionsController;
use App\Http\Controllers\AnswersController;
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
// Redirect to Questions controller
Route::get('/', [QuestionsController::class, 'index']);

// CREATE new question
Route::post('/questions/add',[QuestionsController::class, 'add']); 

// Read question by Id
Route::get('/questions/{question_id}', [QuestionsController::class, 'question']); 
 
// CREATE answer for question by Id
Route::post('/questions/{question_id}/answer', [AnswersController::class, 'add']);
