<?php

use routes\Route;

require_once __DIR__ . "/../configs/autoload.php";
require_once __DIR__ . "/../configs/enviroment.php";
require_once __DIR__ . "/../configs/helpers.php";
require_once __DIR__ . "/../routes/web.php";

$service = requestUri();
$requestMethod = requestMethod();
$headers = view('templates/header', [])[0];
$navLateral = '';

$section = Route::redirect($service,$requestMethod);

$footer = view('templates/footer', [])[0];

include_once(dirname(__DIR__, 1) . '/index.php');
