<?php

namespace routes;

class Route
{
    public static $map = [];

    public static function get(string $route, string $controllerMethod)
    {

        $controllerMethodParams =  explode('/', $controllerMethod);

        SELF::$map['get'][$route] = [
            "route" => $route,
            "controller" => $controllerMethodParams[0],
            "method" => $controllerMethodParams[1],
            "arguments" => ''
        ];
    }

    public static function view(string $route, string $nameView)
    {dd('aca');
        SELF::$map['get'][$route] = [
            "route" => $route,
            "controller" => 'ViewController',
            "method" => 'render',
        ];
    }
    public static function redirect(string $route)
    {
        $class = SELF::$map['get'][$route]["controller"];
        $method = SELF::$map['get'][$route]["method"];

        if (class_exists($class)) {
            require_once "$HOME/Controllers/$class}.php";

            $controller = new $class;
            if (method_exists($controller, $method)) {
                $controller->{$method}($params);
            }
        }
    }
    public static function name(string $name)
    {
    }
}
