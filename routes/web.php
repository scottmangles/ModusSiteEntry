<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\SiteInductionController;
use App\Http\Controllers\QuestionController;
use App\Http\Controllers\OptionController;
use App\Http\Controllers\QuizController;
use App\Http\Controllers\ResultController;

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
    return redirect()->route('login');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');

Route::resource('site_inductions', SiteInductionController::class);
Route::resource('questions', QuestionController::class);
Route::resource('options', OptionController::class);
Route::resource('results', ResultController::class)->only(['index']);
Route::resource('quizes', QuizController::class)->only(['create', 'store']);

require __DIR__.'/auth.php';
