<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PublicApi\AddressController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::get('/', function (Request $request) {
    return 1;
});
Route::get('/areas/provinces', [AddressController::class, 'provinces']);
Route::get('/areas/districts/{province_id}', [AddressController::class, 'districts']);
Route::get('/areas/communes/{district_id}', [AddressController::class, 'communes']);
