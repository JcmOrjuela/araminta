<?php

use routes\Route;

require_once __DIR__ . "/../configs/autoload.php";
require_once __DIR__ . "/../configs/enviroment.php";
require_once __DIR__ . "/../configs/helpers.php";
require_once __DIR__ . "/../routes/web.php";

$header = '';
$lateralNav = '';
$section = 'section';
$footer = '';

$service = requestUri();
$requestMethod = requestMethod();
echo Route::redirect($service);
