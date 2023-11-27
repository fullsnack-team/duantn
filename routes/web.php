<?php

use App\Http\Controllers\Auth\ForgotPasswordController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\Auth\ResetPasswordController;
use App\Http\Controllers\BusinessFieldController;
use App\Http\Controllers\PricingController;
use App\Http\Controllers\TestController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\SeedController;
use App\Http\Controllers\DataSeedController;
use App\Http\Controllers\TenantController;
use App\Http\Controllers\StatisticController;
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

Route::redirect('', '/login');
Route::get('/mail', [TestController::class, 'index']);
Route::get('/create', [TestController::class, 'create']);
Route::get('/list', [TestController::class, 'list']);
Route::post('/upload', [TestController::class, 'upload'])->name('upload');
Route::get('/rename', [TestController::class, 'rename']);
Route::get('/delete', [TestController::class, 'delete']);
Route::match(['get', 'post'], 'login', [LoginController::class, 'login'])->name('login');
Route::match(['get', 'post'], 'register', [RegisterController::class, 'register'])->name('register');
Route::match(['get', 'post'], 'forgot-password', [ForgotPasswordController::class, 'forgotPass'])->name('forgot-password');
Route::get('reset-password/{token}/{email}', [ResetPasswordController::class, 'resetPass'])->name('reset-password');
Route::put('reset-password', [ResetPasswordController::class, 'changePassword']);
Route::get('log-out',[LoginController::class,'logout'])->name('logout');
Route::prefix('admin')->middleware('auth')->name('admin.')->group(function () {
//    Route::view('/', 'admin.dashboard.index')->name('home');
    Route::get('/', [StatisticController::class, 'index'])->name('home');
    Route::prefix('business-field')->name('bf.')->group(function () {
        Route::get('/', [BusinessFieldController::class, 'index'])->name('index');
        Route::post('store', [BusinessFieldController::class, 'store'])->name('create');
        Route::get('show', [BusinessFieldController::class, 'show'])->name('show');
        Route::put('update', [BusinessFieldController::class, 'update'])->name('update');
        Route::delete('delete', [BusinessFieldController::class, 'delete'])->name('delete');
    });
    Route::prefix('seed')->name('seed.')->group(function () {
        Route::get('/', [SeedController::class, 'index'])->name('index');
        Route::get('/show', [SeedController::class, 'show'])->name('show');
        Route::post('/store', [SeedController::class, 'store'])->name('store');
        Route::put('/update', [SeedController::class, 'update'])->name('update');
        Route::delete('/delete', [SeedController::class, 'delete'])->name('delete');
        Route::get('/test', [SeedController::class, 'test'])->name('test');
    });
    Route::prefix('data-seed')->name('data-seed.')->group(function () {
        Route::get('/', [DataSeedController::class, 'index'])->name('index');
        Route::get('/show', [DataSeedController::class, 'show'])->name('show');
        Route::post('/store', [DataSeedController::class, 'store'])->name('store');
        Route::put('/update', [DataSeedController::class, 'update'])->name('update');
        Route::delete('/delete', [DataSeedController::class, 'delete'])->name('delete');
    });
    Route::prefix('pricing')->name('pricing.')->group(function () {
        Route::get('/', [PricingController::class, 'index'])->name('index');
        Route::post('/store', [PricingController::class, 'store'])->name('store');
        Route::get('/show', [PricingController::class, 'show'])->name('show');
        Route::put('/update', [PricingController::class, 'update'])->name('update');
        Route::delete('/delete', [PricingController::class, 'delete'])->name('delete');
    });
    Route::prefix('user')->name('user.')->group(function (){
        Route::get('/',[UserController::class,'index'])->name('index');
        Route::get('trash',[UserController::class,'trash'])->name('trash');
        Route::get('show',[UserController::class,'show'])->name('show');
        Route::post('store',[UserController::class,'store'])->name('store');
        Route::put('update',[UserController::class,'update'])->name('update');
        Route::get('restore',[UserController::class,'restore'])->name('restore');
        Route::delete('delete',[UserController::class,'delete'])->name('delete');
    });
    Route::prefix('tenant')->name('tenant.')->group(function (){
       Route::get('/',[TenantController::class,'index'])->name('index');
       Route::post('store',[TenantController::class,'store'])->name('store');
    });
});
Route::fallback(function () {
    return view('errors.404');
});
