<?php

use App\Http\Controllers\UserController as UserController;
use App\Http\Controllers\EntrySearchController as EntrySearchController;
use App\Http\Controllers\SurveyController as SurveyController;
use App\Http\Controllers\SurveyAnswerController as SurveyAnswerController;
use Illuminate\Foundation\Auth\EmailVerificationRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;

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

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('/', [App\Http\Controllers\RootController::class, 'index'])->name('/');

Route::group(['prefix' => 'email'], function () {
    Route::get('verify', fn () => view('auth.verify-email'))->middleware('auth')->name('verification.notice');
    Route::get('verify/{id}/{hash}', function (EmailVerificationRequest $request) {
        $request->fulfill();
        return redirect('/home');
    })->middleware(['auth', 'signed'])->name('verification.verify');
    Route::post('verification-notification', function (Request $request) {
        $request->user()->sendEmailVerificationNotification();
        return back()->with('message', __('Verification link sent!'));
    })->middleware(['auth', 'throttle:6,1'])->name('verification.send');
});

Route::resource('user', UserController::class)->only(['index', 'show', 'store', 'edit']);

Route::group(['prefix' => 'entry', 'as' => 'entry.'], function () {
    Route::get('/{entry}', [EntrySearchController::class, 'get'])->name('search');
    Route::post('/', fn () => redirect()->route(request('q') != null ? 'entry.search' : '/', ['entry' => request('q')]))->name('post');
});

Route::resource('survey', SurveyController::class)->middleware('log.route');
Route::resource('survey.answer', SurveyAnswerController::class)->only(['store'])->middleware('log.route');

Route::get('surveypopup', [SurveyController::class, 'get'])->name('surveypopup');

Route::resource('user_entries', UserEntriesController::class)->only(['store'])->middleware('log.route')->name('user.toggleentry');