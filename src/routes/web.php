<?php

use App\Http\Controllers\CommentController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ItemController;
use App\Http\Controllers\LikeController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\AddressController;
use App\Http\Controllers\PurchaseController;
use Illuminate\Foundation\Auth\EmailVerificationRequest;
use Illuminate\Http\Request;

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

Route::get('/profile', [ProfileController::class, 'index'])->middleware(['auth', 'verified'])->name('profile.setup');
Route::post('/profile', [ProfileController::class, 'store']);
Route::get('/mypage/profile', [ProfileController::class, 'edit'])->middleware('auth');
Route::patch('/mypage/profile', [ProfileController::class, 'update'])->middleware('auth');
Route::get('/search', [ItemController::class, 'search']);
Route::get('/', [ItemController::class, 'index']);
Route::get('/sell', [ItemController::class, 'sell'])->name('item.sell');
Route::post('/sell', [ItemController::class, 'store'])->name('item.store')->middleware('auth');
Route::get('/mypage', [ItemController::class, 'mypage']);
Route::get('/item/{item_id}', [ItemController::class, 'detail']);

Route::post('/item/{item_id}/comment', [CommentController::class, 'store'])
->name('comments.store')
->middleware('auth');

Route::middleware('auth')->group(function () {
    Route::post('/item/{item_id}/like', [LikeController::class, 'store'])->name('like.store');
    Route::delete('/item/{item_id}/unlike', [LikeController::class, 'destroy'])->name('like.destroy');
});

Route::get('/purchase/{item_id}', [PurchaseController::class, 'index'])->name('purchase.index')->middleware('auth');
Route::post('/purchase/{item_id}', [PurchaseController::class, 'store'])->name('purchase.store');
Route::get('/purchase/success/{item_id}', [PurchaseController::class, 'success'])->name('purchase.success');

Route::get('/purchase/address/{item_id}', [AddressController::class, 'index'])->name('address.index');
Route::patch('/purchase/address/{item_id}', [AddressController::class, 'update'])->name('address.update');

Route::get('/mail', function () {
    return view('mail');
})->name('verification.notice');

Route::get('/mail/verify/{id}/{hash}', function (EmailVerificationRequest $request) {
    $request->fulfill();
    return redirect('/profile');
})->middleware(['auth', 'signed'])->name('verification.verify');

Route::post('/mail', function(Request $request) {
    $request->user()->sendEmailVerificationNotification();
    return back();
})->middleware(['auth', 'throttle:6,1'])->name('verification.send');