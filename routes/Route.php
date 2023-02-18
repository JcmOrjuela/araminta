<?php

namespace routes;

use app\Request;

class Route
{
    public static $map = [];

    public static function get(string $route, string $controllerMethod)
    {

        $controllerMethodParams = explode('@', $controllerMethod);

        self::$map['GET'][$route] = [
            "route" => $route,
            "controller" => "app\Controllers\\{$controllerMethodParams[0]}",
            "method" => $controllerMethodParams[1],
            "arguments" => []
        ];
    }
    public static function post(string $route, string $controllerMethod)
    {

        $controllerMethodParams = explode('@', $controllerMethod);

        self::$map['POST'][$route] = [
            "route" => $route,
            "controller" => "app\Controllers\\{$controllerMethodParams[0]}",
            "method" => $controllerMethodParams[1],
            "arguments" => []
        ];
    }
    public static function delete(string $route, string $controllerMethod)
    {

        $controllerMethodParams = explode('@', $controllerMethod);
        if (preg_match('/(\/\w+\/)\{\w+\}/i', $route)) {
            $route = preg_replace('/(\/\w+\/)\{\w+\}/i', '$1anything', $route);
        }
        self::$map['DELETE'][$route] = [
            "route" => $route,
            "controller" => "app\Controllers\\{$controllerMethodParams[0]}",
            "method" => $controllerMethodParams[1],
            "arguments" => []
        ];
    }

    public static function put(string $route, string $controllerMethod)
    {

        $controllerMethodParams = explode('@', $controllerMethod);
        if (preg_match('/\/\w+\/(\{\w+\})/i', $route)) {
            $route = preg_replace('/\/\w+\/(\{\w+\})/i', '$1', $route);
        }
        self::$map['PUT'][$route] = [
            "route" => $route,
            "controller" => "app\Controllers\\{$controllerMethodParams[0]}",
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
    public static function redirect(string $route, $methodRequest)
    {
        try {
            again:
            if (isset(self::$map[$methodRequest][$route])) {
                $class = self::$map[$methodRequest][$route]["controller"];
                $method = self::$map[$methodRequest][$route]["method"];
                $params = self::$map[$methodRequest][$route]["arguments"];

                $request = new Request();
                if (!empty(toArray($request->all()))) {
                    $params = $request;
                }
                if (class_exists($class)) {
                    $controller = new $class;
                    if (method_exists($controller, $method)) {

                        switch ($methodRequest) {
                            case 'PUT':
                                return $controller->{$method}($params, $id);
                                break;
                            case 'DELETE':
                                return $controller->{$method}($id);
                                break;

                            default:
                                return $controller->{$method}($params);
                                break;
                        }
                    }
                }
            } else {

                $id = preg_replace('/\/\w+\/(\d+)/i', '$1', $route);
                $route = preg_replace('/(\/\w+\/)\d+/i', '$1anything', $route);

                if (
                    isset(self::$map[$methodRequest][$route])
                    && in_array($methodRequest, ['DELETE', 'PUT'])
                ) {
                    goto again;
                }

                $controller = "app\Controllers\ViewController";
                $view = new $controller;
                return $view->render('404');
            }
        } catch (\Exception $e) {
            //throw $th;
        }
    }
}
