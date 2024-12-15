<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\AuthorController;
use App\Http\Controllers\ModalController;

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
// 管理画面ルーティング
Route::middleware('auth')->group(function () {
    Route::get('/admin', [AdminController::class, 'index']);
    Route::get('/admin/search', [AdminController::class, 'search']);
});
Route::get('/modal', [ModalController::class, 'modal']);

// お問い合わせフォームルーティング
Route::get('/', [AuthorController::class, 'index']);
Route::post('/confirm', [AuthorController::class, 'confirm']);
Route::post('/thanks', [AuthorController::class, 'create']);
Route::get('/thanks', [AuthorController::class, 'test']);