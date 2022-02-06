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
Route::get('/etalase', 'EtalaseController@index')->name('etalase');
Route::get('/detail', 'DetailController@index')->name('detail');
Route::get('/checkout', 'CheckoutController@index')->name('checkout');
Route::get('/checkout/success', 'CheckoutController@success')->name('checkout-success');


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
    });
Auth::routes(['verify' => true]);

 