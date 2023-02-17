<?php

namespace app\Controllers;

class ViewController extends Controller
{
    public function render($view)
    {
        $path = dirname(__DIR__, 2) . "/public/views";
        $file = "$path/$view.php";

        $section = file_get_contents($file);

        dd($section);
        return $section;
    }
}