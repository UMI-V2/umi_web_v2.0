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


Route::resource('master_units', App\Http\Controllers\API\master_unitAPIController::class);








Route::resource('master_privileges', App\Http\Controllers\API\master_privilegeAPIController::class);


Route::resource('master_provinces', App\Http\Controllers\API\master_provinceAPIController::class);








Route::resource('master_delivery_services', App\Http\Controllers\API\master_delivery_serviceAPIController::class);


Route::resource('master_payment_methods', App\Http\Controllers\API\master_payment_methodAPIController::class);


Route::resource('master_transaction_categories', App\Http\Controllers\API\master_transaction_categoryAPIController::class);
