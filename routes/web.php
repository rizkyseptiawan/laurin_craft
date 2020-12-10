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

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

Route::group(['as' => 'frontpage.', 'namespace' => 'Frontpage'], function () {
    Route::get('/', 'MainController@homepage')->name('homepage');
    Route::get('/provinces', 'ShippingCheckController@getProvinces')->name('provinces');
    Route::get('/cities', 'ShippingCheckController@getCities')->name('cities');
    Route::get('/shipping/check', 'ShippingCheckController@checkShipping')->name('check.shipping');
    Route::post('/shipping/cost', 'ShippingCheckController@setShippingCost')->name('set.cost');
    Route::post('/', 'MainController@updateCustomerData')->name('customer.data');
    
    Route::group(['as' => 'product.'], function () {
        Route::get('/products', 'MainController@productsList')->name('lists');
        Route::get('/product/{product}', 'MainController@productDetail')->name('detail');
    });

    Route::match(['get', 'post'], 'cart', 'CartActionController')->name('cart');

    Route::get('order', 'ProcessOrderController')->name('order')->middleware('auth');
});

Route::post('xendit-callback', 'Api\XenditWebhookController');

Auth::routes();

Route::group(['middleware' => ['auth']], function () {
    Route::redirect('home', '/', 301);

    Route::group(['prefix' => 'user', 'as' => 'user.', 'namespace' => 'User'], function () {
        Route::get('dashboard', 'ViewDashboardController')->name('dashboard');

        Route::resource('categories', 'CategoryController')->except(['show', 'destroy'])->middleware(['role:Admin']);

        Route::resource('products', 'ProductController')->except(['show', 'destroy'])->middleware(['role:Admin']);

        Route::get('product-links', 'ProductLinkController@index')->name('product-link.index')->middleware(['role:Admin']);

        Route::group(['prefix' => 'products', 'as' => 'product-link.', 'middleware' => 'role:Admin'], function () {
            Route::get('/{product}/link/create', 'ProductLinkController@create')->name('create');
            Route::post('/{product}/link/store', 'ProductLinkController@store')->name('store');
            Route::get('/{product}/link/{productLink}/edit', 'ProductLinkController@edit')->name('edit');
            Route::patch('/{product}/link/{productLink}', 'ProductLinkController@update')->name('update');
        });

        Route::group(['prefix' => 'orders', 'as' => 'orders.'], function () {
            Route::get('/', 'OrderController@index')->name('list');
            Route::get('receipt/{id}/edit', 'OrderController@addReceiptNumber')->name('edit.receipt')->middleware('role:Admin');
            Route::patch('receipt/{id}/edit', 'OrderController@updateReceiptNumber')->name('update.receipt')->middleware('role:Admin');
        });
    });
});
