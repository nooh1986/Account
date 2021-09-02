<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BoxController;
use App\Http\Controllers\InvoiceController;
use App\Http\Controllers\CustomerController;

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

// Route::get('/', function () {
//     return view('dashboard');
// });

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

    });   

require __DIR__.'/auth.php';
