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


Route::get('companies', CompanyController::class);

Route::post('devices', DeviceController::class);

Route::get('sellers/all', [SelllerController::class, 'all']);

Route::get('clients/all', [ClientController::class, 'all']);

Route::get('products/all', [ProductController::class, 'all']);

Route::get('form-payments/all', [FormPaymentController::class, 'all']);

Route::get('condition-payments/all', [ConditionPaymentController::class, 'all']);

Route::post('sales', [SaleController::class, 'store']);
Route::get('sales/all-processed', [SaleController::class, 'allProcessed']);
Route::get('sales/all-integrated', [SaleController::class, 'allIntegrated']);



Route::get(
    'ok',
    function () {
        return response()->json('OK', 200);
    }
);
