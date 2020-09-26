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

Route::get('/', 'FrontController@index')->name('front');
Route::get('/product/{product}', 'FrontController@detail')->name('frontpage.product.detail');

Auth::routes();

Route::group(['middleware' => ['auth']], function () {
    Route::redirect('home', 'user/dashboard')->name('home');

    Route::group(['prefix' => 'user', 'as' => 'user.'], function () {
        Route::get('dashboard', 'User\ViewDashboardController')->name('dashboard');

        Route::resource('categories', 'User\CategoryController')->except(['show', 'destroy']);

        Route::resource('products', 'ProductController')->except(['show', 'destroy']);

        Route::get('product-links', 'User\ProductLinkController@index')->name('product-link.index');

        Route::group(['prefix' => 'products'], function () {
            Route::get('/{product}/link/create', 'User\ProductLinkController@create')->name('product-link.create');
            Route::post('/{product}/link/store', 'User\ProductLinkController@store')->name('product-link.store');
            Route::get('/{product}/link/{productLink}/edit', 'User\ProductLinkController@edit')->name('product-link.edit');
            Route::patch('/{product}/link/{productLink}', 'User\ProductLinkController@update')->name('product-link.update');
        });
    });
});
