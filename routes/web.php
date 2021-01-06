<?php

use App\Http\Controllers\EntrySearchController as EntrySearchController;
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
Route::get('/', fn () => view('home'))->name('/');

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



Route::group(['prefix' => 'entry', 'as' => 'entry.'], function () {
    Route::get('/{entry}', [EntrySearchController::class, 'get'])->name('search');
    Route::post('/', fn () => redirect()->route(request('q') != null ? 'entry.search' : '/', ['entry' => request('q')]))->name('post');
});