<?php

namespace routes;

class Route
{
    public static $map = [];

    public static function get(string $route, string $controllerMethod)
    {

        $controllerMethodParams = explode('/', $controllerMethod);

        self::$map['GET'][$route] = [
            "route" => $route,
            "controller" => $controllerMethodParams[0],
            "method" => $controllerMethodParams[1],
            "arguments" => []
        ];
    }
    public static function post(string $route, string $controllerMethod)
    {

        $controllerMethodParams = explode('/', $controllerMethod);

        self::$map['POST'][$route] = [
            "route" => $route,
            "controller" => $controllerMethodParams[0],
            "method" => $controllerMethodParams[1],
            "arguments" => []
        ];
    }
    public static function delete(string $route, string $controllerMethod)
    {

        $controllerMethodParams = explode('/', $controllerMethod);

        self::$map['DELETE'][$route] = [
            "route" => $route,
            "controller" => $controllerMethodParams[0],
            "method" => $controllerMethodParams[1],
            "arguments" => []
        ];
    }

    public static function put(string $route, string $controllerMethod)
    {

        $controllerMethodParams = explode('/', $controllerMethod);

        self::$map['PUT'][$route] = [
            "route" => $route,
            "controller" => $controllerMethodParams[0],
            "method" => $controllerMethodParams[1],
            "arguments" => []
        ];
    }

    public static function view(string $route, string $viewName, array $params = [])
    {
        self::$map['GET'][$route] = [
            "route" => $route,
            "controller" => 'app\Controllers\ViewController',
            "method" => 'render',
            "arguments" => $viewName
        ];
    }
    public static function redirect(string $route)
    {
        $class = self::$map['GET'][$route]["controller"];
        $method = self::$map['GET'][$route]["method"];
        $params = self::$map['GET'][$route]["arguments"];

        if (class_exists($class)) {
            $controller = new $class;
            if (method_exists($controller, $method)) {
                return $controller->{$method}($params);
            }
        }
    }
}