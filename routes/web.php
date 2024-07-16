<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\HomeController;
use App\Http\Controllers\Admin\MemberController;
use App\Http\Controllers\Admin\StoreController;
use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\AboutController;
use App\Http\Controllers\Admin\TermsController;
use App\Http\Controllers\ReviewController;

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

Route::get('/', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('/home/detail/{id}', [App\Http\Controllers\HomeController::class, 'detail'])->name('home.detail');
Route::post('/store/{id}/review', [ReviewController::class, 'store'])->name('home.review');




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

