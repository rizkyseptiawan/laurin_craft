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

    Route::get('user/dashboard', 'User\ViewDashboardController')->name('user.dashboard');

    Route::group(['prefix' => 'user', 'as' => 'user.'], function () {
        Route::resource('categories', 'CategoryController')->except(['show', 'destroy']);

        Route::resource('products', 'ProductController')->except(['show', 'destroy']);

        Route::get('product-link', 'UserController@productLink')->name('product.link');

        Route::get('/{id}/link/create', 'ProductController@createLink')->name('link.create');
        Route::post('/{id}/link/store', 'ProductController@storeLink')->name('link.store');
        Route::get('/{id}/link/{linkId}/edit', 'ProductController@editLink')->name('link.edit');
        Route::patch('/{id}/link/{linkId}', 'ProductController@updateLink')->name('link.update');
    });
});
