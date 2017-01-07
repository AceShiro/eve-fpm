<?php

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
    return view('pages.login');
});

Route::get('main', 'MainController@redirectToMain')->name('main');

Route::get('minerals', 'MainController@redirectToMinerals')->name('minerals');

Route::get('purchase', function () {
    return view('pages.purchase');
});

Route::get('prices', 'MainController@redirectToPrices')->name('prices');

Route::resource('ships', 'ShipController');
Route::resource('contracts', 'ContractController');
Route::resource('producers', 'ProducerController');

Route::get('auth/eve', 'Auth\AuthController@redirectToProvider');
Route::get('auth/eve/callback', 'Auth\AuthController@handleProviderCallback');

Route::get('auth/eve/session', 'Auth\AuthController@startSession')->name('session');

Route::post('cart', 'CartController@addToContractDatabase')->name('cart');
Route::post('testcart', 'CartController@testCart')->name('testcart');

Route::get('backend', 'MainController@backEndAccess')->name('backend');