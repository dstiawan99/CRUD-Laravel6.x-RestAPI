<?php

use Illuminate\Http\Request;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

// For Products

Route::get('/products', 'ProductController@get');

Route::get('/product/{id}', 'ProductController@getByID');

Route::post('/product', 'ProductController@post');

Route::put('/product/{id}','ProductController@put');

Route::delete('/product/{id}', 'ProductController@delete');


// For Supliers
Route::get('/supliers', 'SuplierController@get');

Route::get('/suplier/{id}', 'SuplierController@getByID');

Route::post('/suplier', 'SuplierController@post');

Route::put('/suplier/{id}','SuplierController@put');

Route::delete('/suplier/{id}', 'SuplierController@delete');


// For Custumers
Route::get('/custumers', 'CustumerController@get');

Route::get('/custumer/{id}', 'CustumerController@getByID');

Route::post('/custumer', 'CustumerController@post');

Route::put('/custumer/{id}','CustumerController@put');

Route::delete('/custumer/{id}', 'CustumerController@delete');


// For Sales
Route::get('/sales', 'SaleController@get');

Route::get('/sale/{id}', 'SaleController@getByID');

Route::post('/sale', 'SaleController@post');

Route::put('/sale/{id}','SaleController@put');

Route::delete('/sale/{id}', 'SaleController@delete');


// For Stores
Route::get('/stores', 'StoreController@get');

Route::get('/store/{id}', 'StoreController@getByID');

Route::post('/store', 'StoreController@post');

Route::put('/store/{id}','StoreController@put');

Route::delete('/store/{id}', 'StoreController@delete');