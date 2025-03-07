<?php

use App\Http\Controllers\CartController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\LoyaltyController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\StripeController;
use App\Http\Controllers\TagsController;
use App\Http\Controllers\UsersController;
use App\Http\Controllers\SettingsController;
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

Route::get('/home/addToCart/{product}', [CartController::class, 'addToCart'])->name('addToCart');
Route::get('/home/showCart', [CartController::class, 'show'])->name('showCart');
Route::get('/home/cart/checkout', [CartController::class, 'checkout'])->name('checkout');
Route::get('/home/deleteItem/{rowId}', [CartController::class, 'delete'])->name('deleteItem');
Route::get('/home/updateItem/{rowId}', [CartController::class, 'update'])->name('updateItem');

Route::get('/home/cart/payment/{order}', [StripeController::class, 'showForm'])->name('showPayment');
Route::post('/home/cart/payment/{order}', [StripeController::class, 'payment'])->name('payment');

Route::get('/home/showDetails/{product}', [ProductController::class, 'showDetails'])->name('showDetails');
Route::get('/home/search', [ProductController::class, 'searchBar'])->name('searchBar');

Route::get('/', [HomeController::class, 'index'])->name('home');
Route::get('/home', [HomeController::class, 'index'])->name('home');
Route::get('/home/{tag}', [ProductController::class, 'productFilter'])->name('productFilter');

Route::middleware(['auth', 'verified'])->group(function () {
    Route::get('/info/settings', [SettingsController::class, 'show'])->name('settings');
    Route::get('/info/editUserInfo', [SettingsController::class, 'edit'])->name('editUserInfo');
    Route::post('/info/store/{user}', [SettingsController::class, 'store'])->name('infoStore');
    Route::post('/info/resetPassword/{user}', [SettingsController::class, 'resetPassword'])->name('infoResetPassword');
    Route::get('/info/delete/{user}', [SettingsController::class, 'delete'])->name('accountDelete');

});

Route::middleware(['auth', 'verified','hasRole:sub'])->group(function () {
    Route::get('/loyalty', [LoyaltyController::class, 'show'])->name('showLoyal');
    Route::get('/home/cart/payment/{user}/{order}', [CartController::class, 'pointForm'])->name('pointForm');
});


Route::middleware(['auth', 'verified','hasRole:admin'])->group(function () {

    Route::get('/dashboard', [DashboardController::class, 'dashboard'])->name('dashboard');
    Route::get('/dashboard/tables/subs', [DashboardController::class, 'showSubs']);
    Route::get('/dashboard/tables/users', [DashboardController::class, 'showUsers']);
    Route::get('/dashboard/tables/products', [DashboardController::class, 'showProducts']);
    Route::get('/dashboard/tables/orders', [OrderController::class, 'showOrders'])->name('ordersTable');

    Route::get('/dashboard/tables/orders/show/{order}', [OrderController::class, 'show'])->name('showOrderDetails');
    Route::get('/dashboard/tables/orders/edit/{order}', [OrderController::class, 'edit'])->name('editOrder');
    Route::post('/dashboard/tables/orders/update/{order}', [OrderController::class, 'update'])->name('updateOrder');
    Route::post('/dashboard/tables/orders/delete/{order}', [OrderController::class, 'delete'])->name('deleteOrder');

    Route::get('/dashboard/tables/users/show/{user}', [UsersController::class, 'show']);
    Route::get('/dashboard/tables/users/edit/{user}', [UsersController::class, 'edit']);
    Route::post('/dashboard/tables/users/editSub/{user}', [UsersController::class, 'editSub']);
    Route::post('/dashboard/tables/users/update/{user}', [UsersController::class, 'update']);
    Route::post('/dashboard/tables/users/delete/{user}', [UsersController::class, 'destroy']);
    Route::get('/dashboard/tables/users/prepareEmail/{user}', [UsersController::class, 'prepareEmail'])->name('prepareEmail');
    Route::post('/dashboard/tables/users/sendEmail/{user}', [UsersController::class, 'sendEmail'])->name('sendEmail');

    Route::get('/dashboard/tables/products/create', [ProductController::class, 'create'])->name('createProduct');
    Route::post('/dashboard/tables/products/store', [ProductController::class, 'store'])->name('storeProduct');
    Route::get('/dashboard/tables/products/show/{product}', [ProductController::class, 'show'])->name('showProduct');
    Route::get('/dashboard/tables/products/edit/{product}', [ProductController::class, 'edit'])->name('editProduct');
    Route::post('/dashboard/tables/products/update/{product}', [ProductController::class, 'update'])->name('updateProduct');
    Route::post('/dashboard/tables/products/addStock/{product}', [ProductController::class, 'addStock'])->name('addStock');
    Route::post('/dashboard/tables/products/delete/{product}', [ProductController::class, 'destroy'])->name('deleteProduct');
    Route::get('/dashboard/tables/products/productStocks', [ProductController::class, 'productsPdf'])->name('productsPdf');
    Route::get('/dashboard/tables/products/showEditProductTags/{product}', [ProductController::class, 'showEditProductTags'])->name('showEditProductTags');
    Route::post('/dashboard/tables/products/editProductTags/{product}', [ProductController::class, 'editProductTags'])->name('editProductTags');

    Route::get('/dashboard/tables/products/tags', [TagsController::class, 'index'])->name('tagMenu');
    Route::post('/dashboard/tables/products/tags/storeTag', [TagsController::class, 'store'])->name('storeTag');
    Route::post('/dashboard/tables/products/tags/deleteTag', [TagsController::class, 'destroy'])->name('deleteTag');
});

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
