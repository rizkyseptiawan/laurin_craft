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

Route::group(['as' => 'frontpage.'], function () {
    Route::get('/', 'FrontController@index')->name('homepage');

    Route::view('cart', 'front.cart')->name('cart');

    Route::get('/product/{product}', 'FrontController@detail')->name('product.detail');
});

Auth::routes();

Route::group(['middleware' => ['auth']], function () {
    Route::redirect('home', '/');

    Route::group(['prefix' => 'user', 'as' => 'user.', 'namespace' => 'User'], function () {
        Route::get('dashboard', 'ViewDashboardController')->name('dashboard');

        Route::resource('categories', 'CategoryController')->except(['show', 'destroy']);

        Route::resource('products', 'ProductController')->except(['show', 'destroy']);

        Route::get('product-links', 'ProductLinkController@index')->name('product-link.index');

        Route::group(['prefix' => 'products'], function () {
            Route::get('/{product}/link/create', 'ProductLinkController@create')->name('product-link.create');
            Route::post('/{product}/link/store', 'ProductLinkController@store')->name('product-link.store');
            Route::get('/{product}/link/{productLink}/edit', 'ProductLinkController@edit')->name('product-link.edit');
            Route::patch('/{product}/link/{productLink}', 'ProductLinkController@update')->name('product-link.update');
        });
    });
});
