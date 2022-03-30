<?php

use Illuminate\Support\Facades\Route;

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

Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', function () {
    return view('dashboard');
})->name('dashboard');


Route::get('generator_builder', '\InfyOm\GeneratorBuilder\Controllers\GeneratorBuilderController@builder')->name('io_generator_builder');

Route::get('field_template', '\InfyOm\GeneratorBuilder\Controllers\GeneratorBuilderController@fieldTemplate')->name('io_field_template');

Route::get('relation_field_template', '\InfyOm\GeneratorBuilder\Controllers\GeneratorBuilderController@relationFieldTemplate')->name('io_relation_field_template');

Route::post('generator_builder/generate', '\InfyOm\GeneratorBuilder\Controllers\GeneratorBuilderController@generate')->name('io_generator_builder_generate');

Route::post('generator_builder/rollback', '\InfyOm\GeneratorBuilder\Controllers\GeneratorBuilderController@rollback')->name('io_generator_builder_rollback');

Route::post(
    'generator_builder/generate-from-file',
    '\InfyOm\GeneratorBuilder\Controllers\GeneratorBuilderController@generateFromFile'
)->name('io_generator_builder_generate_from_file');






















Route::resource('masterProductCategories', App\Http\Controllers\MasterProductCategoryController::class);


Route::resource('masterBusinessCategories', App\Http\Controllers\MasterBusinessCategoryController::class);


Route::resource('masterStatusBusinesses', App\Http\Controllers\MasterStatusBusinessController::class);


Route::resource('masterUnits', App\Http\Controllers\MasterUnitController::class);








Route::resource('masterPrivileges', App\Http\Controllers\MasterPrivilegeController::class);


Route::resource('masterProvinces', App\Http\Controllers\MasterProvinceController::class);








Route::resource('masterDeliveryServices', App\Http\Controllers\MasterDeliveryServiceController::class);


Route::resource('masterPaymentMethods', App\Http\Controllers\MasterPaymentMethodController::class);


Route::resource('masterTransactionCategories', App\Http\Controllers\MasterTransactionCategoryController::class);


Route::resource('masterTransactionCategories', App\Http\Controllers\MasterTransactionCategoryController::class);

Route::resource('masterStatusUsers', App\Http\Controllers\MasterStatusUserController::class);


Route::resource('users', App\Http\Controllers\UserController::class);


Route::resource('businesses', App\Http\Controllers\BusinessController::class);


Route::resource('businessFiles', App\Http\Controllers\BusinessFileController::class);


Route::resource('businessCategories', App\Http\Controllers\BusinessCategoryController::class);


Route::resource('cities', App\Http\Controllers\CityController::class);


Route::resource('subDistricts', App\Http\Controllers\SubDistrictController::class);


Route::resource('addresses', App\Http\Controllers\AddressController::class);


Route::resource('products', App\Http\Controllers\ProductController::class);


Route::resource('productCategories', App\Http\Controllers\ProductCategoryController::class);
