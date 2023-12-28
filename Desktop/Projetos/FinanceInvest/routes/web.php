<?php

use App\Http\Controllers\InstallmentController;
use App\Http\Controllers\PurchaseController;
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
    return view('layouts.base');
});

Route::get('/teste', function () {
    return view('teste');
    
});

Route::get('compras', [PurchaseController::class, 'index'])
    ->name('purchase_get_index');
    
Route::get('compras/nova', [PurchaseController::class, 'create'])
    ->name('purchase_get_create');

Route::get('compra/{id}/editar', [PurchaseController::class, 'edit'])
    ->name('purchase_get_edit');

Route::put('compra/editar', [PurchaseController::class, 'update'])
    ->name('purchase_put_update');


Route::post('compras/nova', [PurchaseController::class, 'store'])
    ->name('purchase_post_store');


Route::get('parcelas', [InstallmentController::class, 'index'])
    ->name('installment_get_index');

Route::get('parcela/{id}/editar', [InstallmentController::class, 'edit'])
    ->name('installment_get_edit');

Route::put('parcela/editar', [InstallmentController::class, 'update'])
    ->name('installment_put_update');

Route::post('parcela/pagar', [InstallmentController::class, 'payInstallment'])
    ->name('installment_post_payInstallment');

