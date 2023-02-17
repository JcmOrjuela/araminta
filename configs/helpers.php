<?php
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
    $uri = preg_replace('/konecta/i', '', $_SERVER['REQUEST_URI']);
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
