<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BoxController;
use App\Http\Controllers\InvoiceController;
use App\Http\Controllers\CustomerController;
use App\Http\Controllers\AccountBoxController;

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


Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');


Route::group(['middleware' => ('auth')] , function()
    { 

        Route::get('/dashboard', function () {return view('dashboard');})->name('dashboard');

        Route::resource('Box' , BoxController::class);

        Route::resource('Customer' , CustomerController::class);

        Route::resource('Invoice' , InvoiceController::class);
        Route::get('download/{id}' , [InvoiceController::class , 'download'])->name('download');

        Route::get('box-account' ,[AccountBoxController::class , 'invoice'])->name('invoices');
        Route::post('box-account' ,[AccountBoxController::class , 'invoice_box'])->name('invoice_box');

        Route::get('box-profits' ,[AccountBoxController::class , 'profits'])->name('profits');
        Route::post('box-profit' ,[AccountBoxController::class , 'profit_box'])->name('profit_box');

        Route::get('customer-account' ,[AccountBoxController::class , 'invoice_customer'])->name('customer-account');
        Route::post('customer-account' ,[AccountBoxController::class , 'customer_invoice'])->name('customer_invoice');
        
    });   

require __DIR__.'/auth.php';
