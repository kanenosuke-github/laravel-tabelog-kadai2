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

    // レビュー投稿フォーム表示とレビュー保存のルート設定
    Route::get('/store/{id}/review', [ReviewController::class, 'create'])->name('home.review.create');
    Route::post('/store/{id}/review', [ReviewController::class, 'store'])->name('home.review.store');

    Route::group(['middleware' => ['auth', 'verified']], function () {
        Route::resource('user', UserController::class)->only(['index', 'edit', 'update']);

        Route::group(['middleware' => [NotSubscribed::class]], function () {
            Route::get('subscription/create', [SubscriptionController::class, 'create'])->name('subscription.create');
            Route::post('subscription', [SubscriptionController::class, 'store'])->name('subscription.store');
        });

        Route::group(['middleware' => [Subscribed::class]], function () {
            Route::get('subscription/edit', [SubscriptionController::class, 'edit'])->name('subscription.edit');
            Route::patch('subscription', [SubscriptionController::class, 'update'])->name('subscription.update');
            Route::get('subscription/cancel', [SubscriptionController::class, 'cancel'])->name('subscription.cancel');
            Route::delete('subscription', [SubscriptionController::class, 'destroy'])->name('subscription.destroy');
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
    Route::get('about', [AboutController::class, 'index'])->name('about');
    Route::get('terms', [TermsController::class, 'index'])->name('terms');
});

