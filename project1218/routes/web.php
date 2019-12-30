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

Route::get('/', 'FrontController@index');

//產品頁面
Route::get('/products', 'FrontController@products');

Route::get('/productType/{id}', 'FrontController@products_type');
Route::get('/products/{id}', 'FrontController@products_detail');

//新聞頁面
Route::get('/news', 'FrontController@news');
Route::get('/news/{id}', 'FrontController@news_detail');

// Auth::routes(['register' => false,'reset' => false,'verify' => false]);
Auth::routes();

//admin
Route::group(['prefix' => 'admin', 'middleware' => ['auth']], function(){
    Route::get('/','AdminController@index');
    Route::post('/ajax_upload_img','AdminController@ajax_upload_img');
    Route::post('/ajax_delete_img','AdminController@ajax_delete_img');
    Route::post('/ajax_delete_product_imgs','AdminController@ajax_delete_product_imgs');
    Route::post('/ajax_sort_product_imgs','AdminController@ajax_sort_product_imgs');

    Route::get('product_type', 'ProductTypeController@index');
    Route::get('product_type/create', 'ProductTypeController@create');
    Route::post('product_type/store', 'ProductTypeController@store');
    Route::get('product_type/edit/{id}', 'ProductTypeController@edit');
    Route::post('product_type/update/{id}', 'ProductTypeController@update');
    Route::post('product_type/destroy/{id}', 'ProductTypeController@destroy');

    Route::get('product', 'ProductController@index');
    Route::get('product/create', 'ProductController@create');
    Route::post('product/store', 'ProductController@store');
    Route::get('product/edit/{id}', 'ProductController@edit');
    Route::post('product/update/{id}', 'ProductController@update');
    Route::post('product/destroy/{id}', 'ProductController@destroy');

    Route::get('news', 'NewsController@index');
    Route::get('news/create', 'NewsController@create');
    Route::post('news/store', 'NewsController@store');
    Route::get('news/edit/{id}', 'NewsController@edit');
    Route::post('news/update/{id}', 'NewsController@update');
    Route::post('news/destroy/{id}', 'NewsController@destroy');
});
