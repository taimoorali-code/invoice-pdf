<?php

use App\Http\Controllers\InvoiceController;
use App\Http\Controllers\OrderController;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Session;



/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('set-language/{lang}', function ($lang) {
    // dd($lang);
    Session::put('locale', $lang);
    // In your route or controller
\Log::info('Current locale:', ['locale' => app()->getLocale()]);

    return redirect()->back();
})->name('set.language');


Route::get('/welcome', function () {
    return view('welcome');
});
Route::get('/form', function () {
    return view('form');
});
Route::post('/orders', [OrderController::class, 'store']);

Route::get('/', [OrderController::class, 'index'])->name('orders.index');
Route::get('/orders/invoice/view/{id}', [OrderController::class, 'viewInvoice'])->name('orders.invoice.view');
Route::get('/orders/invoice/download/{id}', [OrderController::class, 'downloadInvoice'])->name('orders.invoice.download');


// Route::get('/generate-invoice', [InvoiceController::class, 'generateInvoice']);
