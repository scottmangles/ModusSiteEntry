<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\SiteInductionController;
use App\Http\Controllers\QuestionController;
use App\Http\Controllers\OptionController;
use App\Http\Controllers\QuizController;
use App\Http\Controllers\ResultController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\InductionController;

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

Route::get('/dashboard', [DashboardController::class, 'dashboard'])->middleware(['auth'])->name('dashboard');
Route::get('/induction', [InductionController::class, 'induction'])->middleware(['auth'])->name('induction');

Route::resource('site_inductions', SiteInductionController::class)->middleware(['auth']);
Route::resource('questions', QuestionController::class);
Route::resource('options', OptionController::class);
Route::resource('results', ResultController::class)->only(['index']);
Route::resource('quizes', QuizController::class)->only(['create', 'store'])->middleware(['auth']);

require __DIR__.'/auth.php';
