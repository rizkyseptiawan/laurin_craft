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

    Route::group(['as' => 'product.'], function () {
        Route::get('/products', 'MainController@productsList')->name('lists');
        Route::get('/product/{product}', 'MainController@productDetail')->name('detail');
    });

    Route::match(['get', 'post'], 'cart', 'CartActionController')->name('cart');
});

Auth::routes();

Route::group(['middleware' => ['auth']], function () {
    Route::redirect('home', '/', 301);

    Route::group(['prefix' => 'user', 'as' => 'user.', 'namespace' => 'User'], function () {
        Route::get('dashboard', 'ViewDashboardController')->name('dashboard');

        Route::resource('categories', 'CategoryController')->except(['show', 'destroy']);

        Route::resource('products', 'ProductController')->except(['show', 'destroy']);

        Route::get('product-links', 'ProductLinkController@index')->name('product-link.index');

        Route::group(['prefix' => 'products', 'as' => 'product-link.'], function () {
            Route::get('/{product}/link/create', 'ProductLinkController@create')->name('create');
            Route::post('/{product}/link/store', 'ProductLinkController@store')->name('store');
            Route::get('/{product}/link/{productLink}/edit', 'ProductLinkController@edit')->name('edit');
            Route::patch('/{product}/link/{productLink}', 'ProductLinkController@update')->name('update');
        });
    });
});
