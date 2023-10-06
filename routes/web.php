<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TestController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\Apps\UserManagementController;
use App\Http\Controllers\Apps\RoleManagementController;
use App\Http\Controllers\Apps\PermissionManagementController;
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

Route::get('/', function () {
    return view('welcome');
});

Route::get('/test',[TestController::class,'test']);
Route::get('/mail',[TestController::class,'index']);
Route::get('/create',[TestController::class,'create']);
Route::get('/list',[TestController::class,'list']);
Route::post('/upload',[TestController::class,'upload'])->name('upload');
Route::get('/rename',[TestController::class,'rename']);
Route::get('/delete',[TestController::class,'delete']);
Route::prefix('admin')->middleware(['auth','verified'])->group(function () {

    Route::get('/', [DashboardController::class, 'index']);

    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');

    Route::name('user-management.')->group(function () {
        Route::resource('/user-management/users', UserManagementController::class);
        Route::resource('/user-management/roles', RoleManagementController::class);
        Route::resource('/user-management/permissions', PermissionManagementController::class);
    });

});
Route::get('error', function () {
    abort(500);
});

require __DIR__ . '/auth.php';
