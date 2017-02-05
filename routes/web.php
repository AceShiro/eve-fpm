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

Route::group(['prefix' => 'auth'], function(){
    Route::get('eve', 'Auth\AuthController@redirectToProvider');
    Route::get('eve/callback', 'Auth\AuthController@handleProviderCallback');

    Route::get('eve/session', [
        'as' => 'session',
        'uses' => 'Auth\AuthController@startSession'
    ]);
});

Route::group([
    'middleware' => 'auth'
], function(){
    Route::get('main', [
        'as' => 'main',
        'middleware' => 'auth',
        'uses' => 'MainController@redirectToMain'
    ]);

    Route::get('minerals', [
        'as' => 'minerals',
        'middleware' => 'auth',
        'uses' => 'MainController@redirectToMinerals'
    ]);

    Route::get('purchase', function () {
        return view('pages.purchase');
    });

    Route::get('prices', [
        'as' => 'prices',
        'middleware' => 'auth',
        'uses' => 'MainController@redirectToPrices'
    ]);

    Route::resource('ships', 'ShipController');
    Route::resource('contracts', 'ContractController');
    Route::resource('producers', 'ProducerController');

    Route::post('cart', [
        'as' => 'cart',
        'middleware' => 'auth',
        'uses' => 'CartController@addToContractDatabase'
    ]);

    Route::post('testcart', [
        'as' => 'testcart',
        'middleware' => 'auth',
        'uses' => 'CartController@testCart'
    ]);

    Route::get('backend', [
        'as' => 'backend',
        'middleware' => 'auth',
        'uses' => 'MainController@backEndAccess'
    ]);
});