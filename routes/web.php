<?php

use App\Http\Controllers\CompanyController;
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

Auth::routes();

Route::get('/', [CompanyController::class, 'index'])->name('home');
Route::get('/companies/create', [CompanyController::class, 'create'])
    ->name('companies.create');

Route::get('/companies/{id}/edit', [CompanyController::class, 'edit'])
    ->name('companies.edit');

Route::post('/companies/store', [CompanyController::class, 'store'])
    ->name('companies.store');

Route::put('/companies/{id}/update', [CompanyController::class, 'update'])
    ->name('companies.update');

Route::get('/companies/{id}/devices', [CompanyController::class, 'devices'])
    ->name('companies.devices');

Route::get('/companies/{companyId}/devices/{id}', [CompanyController::class, 'destroyDevice'])
    ->name('companies.devices.destroy');
