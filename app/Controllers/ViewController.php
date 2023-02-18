<?php

namespace app\Controllers;

class ViewController extends Controller
{
    public function render($view, array $params = [])
    {
        $path = dirname(__DIR__, 2) . "/public/views";
        $file = "$path/$view.php";
        if (file_exists($file)) {
            include_once $file;
        } else {
            include_once "$path/404.php";
        }
    }
}
