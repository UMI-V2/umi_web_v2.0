<?php

use App\Models\MasterProvince;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\API\AuthController;
use App\Http\Controllers\OpenHourController;
use App\Http\Controllers\API\AuthAPIController;
use App\Http\Controllers\API\UserAPIController;
use App\Http\Controllers\API\AddressAPIController;
use App\Http\Controllers\API\BusinessAPIController;
use App\Http\Controllers\API\OpenHourAPIController;
use App\Http\Controllers\API\MasterCityAPIController;
use App\Http\Controllers\API\MasterProvinceAPIController;
use App\Http\Controllers\MasterDeliveryServiceController;
use App\Http\Controllers\API\BusinessCategoryAPIController;
use App\Http\Controllers\API\MasterSubDistrictAPIController;
use App\Http\Controllers\API\MasterBusinessCategoryAPIController;
use App\Http\Controllers\API\MasterProductCategoryAPIController;
use App\Http\Controllers\API\MasterUnitAPIController;
use App\Http\Controllers\API\ProductAPIController;

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
Route::group(['prefix' => 'masterCategoryBusiness/'], function () {
    Route::get('get', [MasterBusinessCategoryAPIController::class, 'index']);
    Route::post('add', [MasterBusinessCategoryAPIController::class, 'store']);
    Route::delete('delete/{id}', [MasterBusinessCategoryAPIController::class, 'destroy']);
});
// master_delivery_serviceAPIController
Route::get('getMasterDeliveryService', [MasterDeliveryServiceController::class, 'index']);

// Master Province
Route::get('getMasterProvince', [MasterProvinceAPIController::class, 'index']);

// Master MasterCity
Route::get('getMasterCity', [MasterCityAPIController::class, 'index']);

// Master Sub District
Route::get('getSubDistrict', [MasterSubDistrictAPIController::class, 'index']);

Route::group(['prefix' => 'masterCategoryProduct'], function () {
    Route::get('/', [MasterProductCategoryAPIController::class, 'all']);
    // Route::post('update', [ProductAPIController::class, 'store']);
});

Route::group(['prefix' => 'masterUnit'], function () {
    Route::get('/', [MasterUnitAPIController::class, 'all']);
    // Route::post('update', [ProductAPIController::class, 'store']);
});

// AUTH

Route::group(['prefix' => 'auth'], function () {
    Route::post('register', [AuthAPIController::class, 'register']);
    Route::post('login', [AuthAPIController::class, 'login']);
    Route::post('checkNoHp', [AuthAPIController::class, 'checkNoHp']);
    Route::post('changePassword', [AuthAPIController::class, 'changePassword']);
});


Route::middleware('auth:sanctum')->group(function () {
    Route::group(['prefix' => 'user'], function () {
        Route::get('getMyUser', [UserAPIController::class, 'getMyUser']);
        Route::post('update', [UserAPIController::class, 'updateProfile']);
        Route::post('updatePhotoProfile', [UserAPIController::class, 'updatePhotoProfile']);
        Route::post('checkUsername', [UserAPIController::class, 'checkUsername']);
        Route::post('sendVerifikasiEmail', [UserAPIController::class, 'sendEmailVerification']);
    });

    Route::group(['prefix' => 'address'], function () {
        Route::post('updateAddress', [AddressAPIController::class, 'store']);
        Route::get('getAddress', [AddressAPIController::class, 'index']);
        Route::delete('delete', [AddressAPIController::class, 'delete']);

    });
    Route::group(['prefix' => 'business'], function () {
        Route::get('/', [BusinessAPIController::class, 'index']);
        Route::post('update', [BusinessAPIController::class, 'store']);
    });

    Route::group(['prefix' => 'auth'], function () {
        Route::delete('logout', [AuthAPIController::class, 'logout']);
    });

    Route::group(['prefix' => 'businessCategory'], function () {
        Route::get('/', [BusinessCategoryAPIController::class, 'index']);
    });

    Route::group(['prefix' => 'openhours'], function () {
        Route::get('/', [OpenHourAPIController::class, 'index']);
        Route::post('update', [OpenHourAPIController::class, 'update']);
    });

    Route::group(['prefix' => 'product'], function () {
        Route::get('/', [ProductAPIController::class, 'all']);
        Route::post('update', [ProductAPIController::class, 'update']);
        Route::delete('delete', [ProductAPIController::class, 'delete']);

    });
    
    
});

// http:172.0.1:80000/api/v1/business/update


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


Route::resource('master_cities', App\Http\Controllers\API\CityAPIController::class);


Route::resource('sub_districts', App\Http\Controllers\API\SubDistrictAPIController::class);


Route::resource('addresses', App\Http\Controllers\API\AddressAPIController::class);


Route::resource('products', App\Http\Controllers\API\ProductAPIController::class);


Route::resource('product_categories', App\Http\Controllers\API\ProductCategoryAPIController::class);


Route::resource('open_hours', App\Http\Controllers\API\OpenHourAPIController::class);


Route::resource('business_delivery_services', App\Http\Controllers\API\BusinessDeliveryServiceAPIController::class);


Route::resource('shipping_cost_variables', App\Http\Controllers\API\ShippingCostVariableAPIController::class);


Route::resource('shipping_useds', App\Http\Controllers\API\ShippingUsedAPIController::class);


Route::resource('discounts', App\Http\Controllers\API\DiscountAPIController::class);


Route::resource('sales_delivery_services', App\Http\Controllers\API\SalesDeliveryServiceAPIController::class);


Route::resource('product_files', App\Http\Controllers\API\ProductFileAPIController::class);


Route::resource('business_payment_methods', App\Http\Controllers\API\BusinessPaymentMethodAPIController::class);


Route::resource('sales_transactions', App\Http\Controllers\API\SalesTransactionAPIController::class);


Route::resource('ratings', App\Http\Controllers\API\RatingAPIController::class);


Route::resource('transaction_statuses', App\Http\Controllers\API\TransactionStatusAPIController::class);


Route::resource('transaction_products', App\Http\Controllers\API\TransactionProductAPIController::class);


Route::resource('balances', App\Http\Controllers\API\BalancesAPIController::class);


