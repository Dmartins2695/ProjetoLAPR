<?php

use App\Http\Controllers\DashboardController;
use Illuminate\Foundation\Auth\EmailVerificationRequest;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
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

Auth::routes(['verify'=>true]);

Route::get('/', [HomeController::class, 'index'])->name('home')->middleware('verified');
Route::get('/home', [HomeController::class, 'index'])->name('home')->middleware('verified');
Route::get('/dashboard', [HomeController::class, 'dashboard'])->name('dashboard')->middleware('verified');
Route::get('/dashboard/tables/subs', [DashboardController::class, 'showSubs'])->middleware('verified');
Route::get('/dashboard/tables/users', [DashboardController::class, 'showUsers'])->middleware('verified');
Route::get('/dashboard/tables/products', [DashboardController::class, 'showProducts'])->middleware('verified');


Route::get('/email/verify', function () {
    return view('auth.verify');
})->middleware('auth')->name('verification.notice');

Route::get('/email/verify/{id}/{hash}', function (EmailVerificationRequest $request) {
    $request->fulfill();

    return redirect('/home');
})->middleware(['auth', 'signed'])->name('verification.verify');

Route::post('/email/verification-notification', function (Request $request) {
    $request->user()->sendEmailVerificationNotification();

    return back()->with('message', 'Verification link sent!');
})->middleware(['auth', 'throttle:6,1'])->name('verification.send');







