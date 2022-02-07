<?php

use App\Http\Controllers\Api\{
    CompanyController,
    DeviceController,
    SelllerController,
    ClientController,
    ProductController
};
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


Route::get('companies', CompanyController::class);

Route::post('devices', DeviceController::class);

Route::get('sellers/all', [SelllerController::class, 'all']);

Route::get('clients/all', [ClientController::class, 'all']);

Route::get('products/all', [ProductController::class, 'all']);
