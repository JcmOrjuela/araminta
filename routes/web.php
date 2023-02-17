<?php

use routes\Route;

Route::view('/', 'home');

Route::get('/products', 'ProductController@index');
