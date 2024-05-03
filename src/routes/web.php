<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\RegisteredUserController;
use App\Http\Controllers\AuthenticatedSessionController;

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

// お問い合わせフォーム
Route::get('/', [ContactController::class, 'index']);
Route::post('/', [ContactController::class, 'modify']);
Route::post('/confirm', [ContactController::class, 'confirm']);
Route::post('/thanks', [ContactController::class, 'store']);
Route::get('/thanks', [ContactController::class, 'thanks']);

// 認証関連
Route::post('/register', [RegisteredUserController::class, 'store']);
Route::post('/login', [AuthenticatedSessionController::class, 'store']);

// 管理画面
Route::middleware('auth')->group(function () {
    Route::get('/admin', [AdminController::class, 'admin']);
    Route::get('/admin/search', [AdminController::class, 'search']);
    Route::post('/admin/delete', [AdminController::class, 'destroy']);
    Route::get('/admin/export', [AdminController::class, 'export']);
});

