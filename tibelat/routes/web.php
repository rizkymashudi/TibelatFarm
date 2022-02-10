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

// Route FrontEnd
Route::get('/', 'HomeController@index')->name('home');
Route::get('/etalase-katalog', 'EtalaseFEController@index')->name('etalase-katalog');

Route::get('/detail/{slug}', 'DetailController@index')->name('detail');

//Checkout
Route::get('/keranjang/checkout', 'CheckoutController@index')->name('cart');

Route::post('/checkout/{id}', 'CheckoutController@process')->name('cart-process')
                                                        ->middleware(['auth', 'verified']);

Route::post('/checkout/done/{id}', 'CheckoutController@create')->name('checkout-done')
                                                        ->middleware(['auth', 'verified']);

Route::get('/checkout/remove/{id}', 'CheckoutController@remove')->name('checkout-remove')
                                                        ->middleware(['auth', 'verified']);


// Route::get('/checkout/success', 'CheckoutController@success')->name('checkout_success');


// Route BackEnd
Route::prefix('admin')
    ->namespace('Admin')
    ->middleware(['auth', 'admin'])
    ->group(function () {
        Route::get('/', 'DashboardController@index')->name('dashboard');
        Route::resource('etalase', 'EtalaseController');
        Route::resource('gallery', 'GalleryEtalaseController');
        Route::resource('transactionCOD', 'TransactionController');
        Route::resource('transactionTF', 'TransactionTFController');
        Route::resource('transactionDone', 'TransactionDoneController');
        Route::resource('customer', 'CustomerController');
        Route::resource('sales-report', 'SalesReportController');
        Route::resource('sales-report-detail', 'DetailSalesReportController');
    });
Auth::routes(['verify' => true]);

 