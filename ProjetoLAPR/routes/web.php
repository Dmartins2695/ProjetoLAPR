<?php

use App\Http\Controllers\CartController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\UsersController;
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

Auth::routes(['verify' => true]);

Route::get('/', [HomeController::class, 'index'])->name('home');
Route::get('/home', [HomeController::class, 'index'])->name('home');

Route::get('/dashboard', [DashboardController::class, 'dashboard'])->name('dashboard')->middleware('verified');
Route::get('/dashboard/tables/subs', [DashboardController::class, 'showSubs'])->middleware('verified');
Route::get('/dashboard/tables/users', [DashboardController::class, 'showUsers'])->middleware('verified');
Route::get('/dashboard/tables/products', [DashboardController::class, 'showProducts'])->middleware('verified');

Route::get('/home/addToCart', [CartController::class, 'addToCart']);
Route::get('/home/showCart', [CartController::class, 'show']);
// dar update no middleware de verified para Admin (chained ou alterar apenas)
Route::get('/dashboard/tables/users/show/{user}', [UsersController::class, 'show'])->middleware('verified');
Route::get('/dashboard/tables/users/edit/{user}', [UsersController::class, 'edit'])->middleware('verified');
Route::post('/dashboard/tables/users/editSub/{user}', [UsersController::class, 'editSub'])->middleware('verified');
Route::post('/dashboard/tables/users/update/{user}', [UsersController::class, 'update'])->middleware('verified');
Route::post('/dashboard/tables/users/delete/{user}', [UsersController::class, 'destroy'])->middleware('verified');

Route::get('/dashboard/tables/products/create', [ProductController::class, 'create'])->name('createProduct')->middleware('verified');
Route::post('/dashboard/tables/products/store', [ProductController::class, 'store'])->name('storeProduct')->middleware('verified');
Route::get('/dashboard/tables/products/show/{product}', [ProductController::class, 'show'])->name('showProduct')->middleware('verified');
Route::get('/dashboard/tables/products/edit/{product}', [ProductController::class, 'edit'])->name('editProduct')->middleware('verified');
Route::post('/dashboard/tables/products/update/{product}', [ProductController::class, 'update'])->name('updateProduct')->middleware('verified');
Route::post('/dashboard/tables/products/addStock/{product}', [ProductController::class, 'addStock'])->name('addStock')->middleware('verified');
Route::post('/dashboard/tables/products/delete/{product}', [ProductController::class, 'destroy'])->name('deleteProduct')->middleware('verified');




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







