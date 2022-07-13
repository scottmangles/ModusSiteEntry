<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\SiteInductionController;
use App\Http\Controllers\QuestionController;
use App\Http\Controllers\OptionController;
use App\Http\Controllers\QuizController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\InductionController;
use App\Http\Controllers\SiteController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\ContractorController;

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


Route::resource('sites', SiteController::class)->middleware('auth');
Route::resource('site_inductions', SiteInductionController::class)->middleware(['auth']);
Route::resource('questions', QuestionController::class);
Route::resource('options', OptionController::class);
Route::resource('quizes', QuizController::class)->only(['create', 'store'])->middleware(['auth']);
Route::resource('users', UserController::class)->except(['create', 'show']);
Route::resource('contractors', ContractorController::class);

//Find user id and pass perameter to sign in construction site function
Route::get('/userfind/site/{site_id}', [App\Http\Controllers\SiteUserController::class, 'findUserId'])->middleware('auth')->name('findUserId');

//Find user id and pass perameter to sign out of construction site function
Route::get('/userfind/site/{site_id}/out', [App\Http\Controllers\SiteUserController::class, 'findUserIdOut'])->middleware('auth');

//sign user into construction site
Route::get('/user/{user_id}/site/{site_id}/signin', [App\Http\Controllers\SiteUserController::class, 'attachSiteUser'])->middleware('auth')->name('signinsite');
//sign user out of construction site
Route::get('/id/{site_pivot_id}/user/{user_id}/site/{site_id}/signout', [App\Http\Controllers\SiteUserController::class, 'signOutSiteUser'])->middleware('auth')->name('signoutsite');

Route::get('/id/{site_pivot_id}/user/{user_id}/site/{site_id}/signoutsitemanager', [App\Http\Controllers\SiteUserController::class, 'signOutSiteManager'])->middleware('auth')->name('signoutsitemanager');

Route::post('/site/mansignin', [App\Http\Controllers\SiteUserController::class, 'manualSiteEntry'])->middleware('auth')->name('manualSignIn');



/// Routes to show access status access granted, access warning and access denied

//show site access and site supervised
Route::get('/showsiteaccess/{site_id}', [App\Http\Controllers\SiteAccessController::class, 'showUsersAccess'])->name('showUsersAccess');
//show banned users for site
Route::get('/showbannedusers/{site_id}', [App\Http\Controllers\SiteAccessController::class, 'showUsersBanned'])->name('showUsersBanned');



///Routes to change ste access from the respective site manager///

//allow site access
Route::get('/{user_id}/allow/{site_id}', [App\Http\Controllers\SiteAccessController::class, 'allowAccess'])->name('allowAccess');
//allow supervised access
Route::get('/{user_id}/supervised/{site_id}', [App\Http\Controllers\SiteAccessController::class, 'allowSupervised'])->name('allowSupervised');
//change to allow access
Route::get('/{user_id}/update/{siteInduction_id}/allow/{site_id}', [App\Http\Controllers\SiteAccessController::class, 'changeToAccess'])->name('changeToAccess');
// change to supervised access
Route::get('/{user_id}/update/{siteInduction_id}/supervised/{site_id}', [App\Http\Controllers\SiteAccessController::class, 'changeToSupervised'])->name('changeToSupervised');
// change to ban site access
Route::get('/{user_id}/{siteInduction_id}/banuser/{site_id}', [App\Http\Controllers\SiteAccessController::class, 'banAccess'])->name('banAccess');

require __DIR__.'/auth.php';
