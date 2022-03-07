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






















Route::resource('masterProductCategories', App\Http\Controllers\master_product_categoryController::class);


Route::resource('masterBusinessCategories', App\Http\Controllers\master_business_categoryController::class);


Route::resource('masterStatusBusinesses', App\Http\Controllers\master_status_businessController::class);


Route::resource('masterUnits', App\Http\Controllers\master_unitController::class);








Route::resource('masterPrivileges', App\Http\Controllers\master_privilegeController::class);


Route::resource('masterProvinces', App\Http\Controllers\master_provinceController::class);








Route::resource('masterDeliveryServices', App\Http\Controllers\master_delivery_serviceController::class);


Route::resource('masterPaymentMethods', App\Http\Controllers\master_payment_methodController::class);


Route::resource('masterTransactionCategories', App\Http\Controllers\master_transaction_categoryController::class);


Route::resource('masterTransactionCategories', App\Http\Controllers\master_transaction_categoryController::class);

Route::resource('masterStatusUsers', App\Http\Controllers\master_status_userController::class);
