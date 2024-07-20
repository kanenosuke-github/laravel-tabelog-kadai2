<?php

use Illuminate\Support\Facades\Route;
use App\Http\Middleware\Subscribed;
use App\Http\Middleware\NotSubscribed;
use App\Http\Controllers\Admin\HomeController;
use App\Http\Controllers\Admin\MemberController;
use App\Http\Controllers\Admin\StoreController;
use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\AboutController;
use App\Http\Controllers\Admin\TermsController;
use App\Http\Controllers\ReviewController;
use App\Http\Controllers\SubscriptionController;
use App\Http\Controllers\ReservationController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

//Route::get('/', function () {
//    return view('welcome');
//});
Route::group(['middleware' => 'guest:admin'], function () {
    Route::get('/', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
    Route::get('/home/detail/{id}', [App\Http\Controllers\HomeController::class, 'detail'])->name('home.detail');

    
    Route::group(['middleware' => ['auth', 'verified']], function () {
        // 無料会員 or 無料会員が見られるルート
        Route::get('/reviews', [ReviewController::class, 'index'])->name('reviews.index');


        Route::group(['middleware' => [NotSubscribed::class]], function () {
            Route::get('subscription/create', [SubscriptionController::class, 'create'])->name('subscription.create');
            Route::post('subscription', [SubscriptionController::class, 'store'])->name('subscription.store');
            
        });

        Route::group(['middleware' => [Subscribed::class]], function () {
            Route::get('subscription/edit', [SubscriptionController::class, 'edit'])->name('subscription.edit');
            Route::patch('subscription', [SubscriptionController::class, 'update'])->name('subscription.update');
            Route::get('subscription/cancel', [SubscriptionController::class, 'cancel'])->name('subscription.cancel');
            Route::delete('subscription', [SubscriptionController::class, 'destroy'])->name('subscription.destroy');
            // 有料会員専用のルート
            // レビュー投稿フォーム表示とレビュー保存のルート設定
            Route::get('/store/{id}/review', [ReviewController::class, 'create'])->name('home.review.create');
            Route::post('/store/{id}/review', [ReviewController::class, 'store'])->name('home.review.store');
            //予約
            Route::get('/reservations', [ReservationController::class, 'index'])->name('user.reservations.index');
            Route::get('/stores/{store}/reservations/create', [ReservationController::class, 'create'])->name('user.reservations.create');
            Route::post('/stores/{store}/reservations', [ReservationController::class, 'store'])->name('user.reservations.store');
            Route::delete('/reservations/{reservation}', [ReservationController::class, 'destroy'])->name('user.reservations.destroy');
    });

    });
});
// 認証ルート
require __DIR__.'/auth.php';

// 管理画面のルートグループ
Route::group(['prefix' => 'admin', 'as' => 'admin.', 'middleware' => 'auth:admin'], function () {
    Route::get('/home', [HomeController::class, 'index'])->name('home');
    Route::get('members', [MemberController::class, 'index'])->name('members');
    Route::resource('stores', StoreController::class);
    Route::get('category', [CategoryController::class, 'index'])->name('category.index');
});




// routes/web.php
Route::get('/about', function () {
    return view('about');
})->name('about');

// routes/web.php
Route::get('/terms', function () {
    return view('terms'); // 場合によっては別のビュー名になるかもしれません
})->name('terms');