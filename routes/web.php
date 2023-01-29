<?php

use App\Http\Controllers\QuestionController;
use App\Models\Answer;
use App\Models\Question;
use App\Models\QuestionType;
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

// Route::get('/', function () {
//     return view('home', [
//         'questions' => Question::all(),
//         'types' => QuestionType::all()
//     ]);
// });

// Route::get('/question/{id}', function ($id) {
//     return view('question', [
//         'question' => Question::find($id),
//         'types' => QuestionType::all()
//     ]);
// });

// Route::get('/create/{id}', function ($id) {
//     return view('create', [
//         'questionType' => QuestionType::find($id),
//         'types' => QuestionType::all()
//     ]);
// });

// Route::get('/', [QuestionController::class, 'index']);
Route::get('/', [QuestionController::class, 'index']);

Route::get('/question/{id}', [QuestionController::class, 'show']);

Route::get('/create/{id}', [QuestionController::class, 'create']);

Route::get('/question/{id}/edit', [QuestionController::class, 'edit']);

Route::post('/questions/{id}', [QuestionController::class, 'store']);

Route::put('/edit/{id}', [QuestionController::class, 'update']);

Route::delete('/question/{id}/delete', [QuestionController::class, 'destroy']);
