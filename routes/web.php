<?php

use routes\Route;

Route::view('/', 'home');

Route::get('/products', 'ProductController@index');
Route::post('/products/create', 'ProductController@store');
Route::put('/products/{id}', 'ProductController@update');
Route::delete('/products/{id}', 'ProductController@destroy');

Route::get('/sales', 'SaleController@index');
Route::post('/sales/create', 'SaleController@store');
Route::put('/sales/{id}', 'SaleController@update');
Route::delete('/sales/{id}', 'SaleController@destroy');
