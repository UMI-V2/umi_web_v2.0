<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\API\AuthController;
use App\Http\Controllers\API\AuthAPIController;
use App\Http\Controllers\API\AddressAPIController;
use App\Http\Controllers\API\BusinessAPIController;
use App\Http\Controllers\API\BusinessCategoryAPIController;
use App\Http\Controllers\API\MasterCityAPIController;
use App\Http\Controllers\API\master_provinceAPIController;
use App\Http\Controllers\API\MasterSubDistrictAPIController;
use App\Http\Controllers\API\master_delivery_serviceAPIController;
use App\Http\Controllers\API\master_business_categoryAPIController;
use App\Http\Controllers\API\UserAPIController;

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
    #Users
    Route::get('getUser', [UserAPIController::class, 'get']);
    Route::post('updateUser', [UserAPIController::class, 'updateProfile']);
    Route::post('updatePhotoProfile', [UserAPIController::class, 'updatePhotoProfile']);

    #Address
    Route::post('updateAddress', [AddressAPIController::class, 'store']);
    Route::get('getAddress', [AddressAPIController::class, 'index']);
    #business
    Route::post('updateBusiness', [BusinessAPIController::class, 'store']);
    Route::get('getBusiness', [BusinessAPIController::class, 'index']);
    #Auth
    Route::delete('logout', [AuthAPIController::class, 'logout']);

    #Business Category
    Route::get('getBusinessCategory', [BusinessCategoryAPIController::class, 'index']);
    // Route::post('updateBusinessCategory', [BusinessCategoryAPIController::class, 'store']);
    // Route::delete('deleteBusinessCategory', [BusinessCategoryAPIController::class, 'destroy']);

});


Route::resource('master_product_categories', App\Http\Controllers\API\MasterProductCategoryAPIController::class);


Route::resource('master_business_categories', App\Http\Controllers\API\MasterBusinessCategoryAPIController::class);


Route::resource('master_status_businesses', App\Http\Controllers\API\MasterStatusBusinessAPIController::class);


Route::resource('master_units', App\Http\Controllers\API\MasterUnitAPIController::class);


Route::resource('master_privileges', App\Http\Controllers\API\MasterPrivilegeAPIController::class);


Route::resource('master_provinces', App\Http\Controllers\API\MasterProvinceAPIController::class);


Route::resource('master_delivery_services', App\Http\Controllers\API\MasterDeliveryServiceAPIController::class);


Route::resource('master_payment_methods', App\Http\Controllers\API\MasterPaymentMethodAPIController::class);


Route::resource('master_transaction_categories', App\Http\Controllers\API\MasterTransactionCategoryAPIController::class);

Route::resource('master_status_users', App\Http\Controllers\API\MasterStatusUserAPIController::class);


Route::resource('users', App\Http\Controllers\API\UserAPIController::class);


Route::resource('businesses', App\Http\Controllers\API\BusinessAPIController::class);


Route::resource('business_files', App\Http\Controllers\API\BusinessFileAPIController::class);


Route::resource('business_categories', App\Http\Controllers\API\BusinessCategoryAPIController::class);


Route::resource('cities', App\Http\Controllers\API\CityAPIController::class);
