<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\API\AuthController;
use App\Http\Controllers\API\AuthAPIController;
use App\Http\Controllers\API\AddressAPIController;
use App\Http\Controllers\API\BusinessAPIController;
use App\Http\Controllers\API\MasterCityAPIController;
use App\Http\Controllers\API\master_provinceAPIController;
use App\Http\Controllers\API\MasterSubDistrictAPIController;
use App\Http\Controllers\API\master_delivery_serviceAPIController;
use App\Http\Controllers\API\master_business_categoryAPIController;

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

#Master category business
Route::get('getMasterCategoryBusiness', [master_business_categoryAPIController::class, 'index']);
Route::post('addMasterCategoryBusiness', [master_business_categoryAPIController::class, 'store']);

// master_delivery_serviceAPIController
Route::get('getMasterDeliveryService', [master_delivery_serviceAPIController::class, 'index']);

// Master Province
Route::get('getMasterProvince', [master_provinceAPIController::class, 'index']);

// Master City
Route::get('getMasterCity', [MasterCityAPIController::class, 'index']);

// Master Sub District
Route::get('getSubDistrict', [MasterSubDistrictAPIController::class, 'index']);



// AUTH
Route::post('register', [AuthAPIController::class, 'register']);
Route::post('login', [AuthAPIController::class, 'login']);
Route::post('checkNoHp', [AuthAPIController::class, 'checkNoHp']);
Route::post('changePassword', [AuthAPIController::class, 'changePassword']);


Route::middleware('auth:sanctum')->group(function (){
    #Address
    Route::post('updateAddress', [AddressAPIController::class, 'store']);
    Route::get('getAddress', [AddressAPIController::class, 'index']);
    #business
    Route::post('updateBusiness', [BusinessAPIController::class, 'store']);
    Route::get('getBusiness', [BusinessAPIController::class, 'index']);
    
    Route::delete('logout', [AuthController::class, 'logout']);
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

Route::resource('master_status_users', App\Http\Controllers\API\master_status_userAPIController::class);
