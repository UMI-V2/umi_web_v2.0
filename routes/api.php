<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});
















Route::resource('master_product_categories', App\Http\Controllers\API\master_product_categoryAPIController::class);


Route::resource('master_business_categories', App\Http\Controllers\API\master_business_categoryAPIController::class);


Route::resource('master_status_businesses', App\Http\Controllers\API\master_status_businessAPIController::class);
