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

Route::get('/','FrontController@index');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

//admin
Route::group(['prefix' => 'admin', 'middleware' => ['auth']], function(){
    Route::get('/','AdminController@index');
    Route::post('/ajax_upload_img','AdminController@ajax_upload_img');
    Route::post('/ajax_delete_img','AdminController@ajax_delete_img');
    Route::post('/ajax_delete_product_imgs','AdminController@ajax_delete_product_imgs');
    Route::post('/ajax_sort_product_imgs','AdminController@ajax_sort_product_imgs');

    Route::get('banner', 'BannerController@index');
    Route::get('banner/create', 'BannerController@create');
    Route::post('banner/store', 'BannerController@store');
    Route::get('banner/edit/{id}', 'BannerController@edit');
    Route::post('banner/update/{id}', 'BannerController@update');
    Route::post('banner/destroy/{id}', 'BannerController@destroy');

    // Route::get('product', 'ProductController@index');
    // Route::get('product/create', 'ProductController@create');
    // Route::post('product/store', 'ProductController@store');
    // Route::get('product/edit/{id}', 'ProductController@edit');
    // Route::post('product/update/{id}', 'ProductController@update');
    // Route::post('product/destroy/{id}', 'ProductController@destroy');

    // Route::get('news', 'NewsController@index');
    // Route::get('news/create', 'NewsController@create');
    // Route::post('news/store', 'NewsController@store');
    // Route::get('news/edit/{id}', 'NewsController@edit');
    // Route::post('news/update/{id}', 'NewsController@update');
    // Route::post('news/destroy/{id}', 'NewsController@destroy');
});
