<?php

use App\Http\Controllers\Api\{
    CompanyController,
    DeviceController,
    SelllerController,
    ClientController,
    ConditionPaymentController,
    ProductController,
    FormPaymentController,
    SaleController,
};

use Illuminate\Support\Facades\Route;


Route::get('companies', CompanyController::class);

Route::post('devices', [DeviceController::class, 'store']);
Route::put('devices', [DeviceController::class, 'update']);

Route::get('sellers/all', [SelllerController::class, 'all']);
Route::post('sellers/store', [SelllerController::class, 'store']);

Route::get('clients/all', [ClientController::class, 'all']);
Route::post('clients/store', [ClientController::class, 'store']);

Route::get('products/all', [ProductController::class, 'all']);
Route::post('products/store', [ProductController::class, 'store']);

Route::get('form-payments/all', [FormPaymentController::class, 'all']);
Route::post('form-payments/store', [FormPaymentController::class, 'store']);

Route::get('condition-payments/all', [ConditionPaymentController::class, 'all']);
Route::post('condition-payments/store', [ConditionPaymentController::class, 'store']);

Route::post('sales', [SaleController::class, 'store']);
Route::get('sales/all-processed', [SaleController::class, 'allProcessed']);
Route::get('sales/all-integrated', [SaleController::class, 'allIntegrated']);
Route::put('sales/{uuid}/processed', [SaleController::class, 'processed']);
Route::put('sales/{uuid}/fail', [SaleController::class, 'fail']);


Route::get(
    'ok',
    function () {
        return response()->json('OK', 200);
    }
);
