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

Route::get('/', 'FrontController@index')->name('front');
Route::get('/product/detail/{id}', 'FrontController@show')->name('product.detail');

Route::group(['middleware' => ['auth']], function () {
    Route::get('user/dashboard', 'UserController@product')->name('user.dashboard');
    Route::get('user/product', 'UserController@product')->name('user.product');
    Route::get('user/category', 'UserController@category')->name('user.category');
    Route::get('user/product-link', 'UserController@productLink')->name('user.product.link');
    Route::resource('category', 'CategoryController');
    Route::resource('product', 'ProductController');
    Route::group(['prefix' => 'user', 'as' => 'user.'], function () {
        // Route::get('/{id}/link', 'ProductController@indexLink')->name('link.index');
        Route::get('/{id}/link/create', 'ProductController@createLink')->name('link.create');
        Route::post('/{id}/link/store', 'ProductController@storeLink')->name('link.store');
        // Route::get('/{id}/link/{linkId}/change-status', 'ProductController@changeLinkStatus')->name('link.change-status');
        Route::get('/{id}/link/{linkId}/edit', 'ProductController@editLink')->name('link.edit');
        Route::patch('/{id}/link/{linkId}', 'ProductController@updateLink')->name('link.update');
    });
});

Auth::routes();
Route::get('/home', 'HomeController@index')->name('home');
