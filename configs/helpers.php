<?php

use app\Controllers\ViewController;
use routes\Route;

function dd($data, $var = 'web')
{
    switch ($var) {
        case 'web':
            echo "<pre>";
            die(print_r($data));
            break;
        case 'vardum':
            die(var_dump($data));
            break;
        case 'console':
            die(var_dump($data));
            break;
    }
}

function requestUri()
{
    $index = strpos($_SERVER['REQUEST_URI'], PROJECT_NAME);
    $requestUri = substr($_SERVER['REQUEST_URI'], $index);
    $uri = preg_replace('/' . PROJECT_NAME . '/i', '', $requestUri);
    return preg_replace('/\/\//i', '/', $uri);
}

function requestMethod()
{
    $requestMethod = $_SERVER['REQUEST_METHOD'];

    if ($requestMethod == 'POST') {

        if (isset($_POST['method'])) {
            return strtoupper($_POST['method']);
        }
    }

    return $requestMethod;
}
function camelCaseToSnakeCase($str)
{
    $str = preg_replace('/([a-z])([A-Z])/', '$1_$2', $str);
    return strtolower($str);
}
function snakeCaseToCamelCase($str)
{
    $str = ucwords($str, '_');
    $str = lcfirst($str);
    $str = str_replace('_', '', $str);
    return $str;
}

function singularToPlural($word)
{
    $irregulars = array(
        'child' => 'children',
        'foot' => 'feet',
        'goose' => 'geese',
        'man' => 'men',
        'person' => 'people',
        'tooth' => 'teeth',
    );

    $lastChar = strtolower($word[strlen($word) - 1]);
    if (array_key_exists($word, $irregulars)) {
        return $irregulars[$word];
    } elseif ($lastChar === 'y' && !in_array(strtolower($word), array('day', 'key', 'money', 'turkey'))) {
        return substr($word, 0, -1) . 'ies';
    } elseif ($lastChar === 's') {
        return $word . 'es';
    } else {
        return $word . 's';
    }
}

function toArray($data)
{
    return (array) $data;
}
function toJson($data)
{
    return json_encode($data);
}

function redirect($route)
{
    $route = "/" . ROOT . $route;
    header("Location: $route");
}
function view($route, array $params)
{
    $view =  new  ViewController;
    return $view->render($route, $params);
}

function route($route)
{
    return ROOT . $route;
}
