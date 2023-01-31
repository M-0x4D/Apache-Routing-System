<?php

namespace Router\Support\Router;

use Router\Support\HTTP\Request;
class Router
{
    const CONTROLLERS_NAMESPACE = 'Router\Controllers';

    protected static array $routes;

    static function get($route , $action)
    {
        return self::register('get' ,$route , $action );

    }

    static function post($route , $action)
    {
        return self::register('post' ,$route , $action );

    }

    static function register(string $requestMethod,string $route , callable $action)
    {
        self::$routes[$requestMethod][$route] = $action;
    }


    static function getResolve(string $requestUri , $requestMethod)
    {
        if (!$_GET) {
            return;
        }
        $route = explode('?', $requestUri)[0];
        $route = explode('/', $route)[2];
        $action = self::$routes[$requestMethod][$route];
        if (!$action) {
            return;
        }
        $request = new Request();
        
        if (is_array($action)) {
            [$class , $method] = $action;
            if (class_exists($class)) {
                $class = new $class;
                if (method_exists($class , $method) ) {
                    return call_user_func_array([$class, $method],[$request]);
                }
            }
        }
        if (is_string($action)) {
            [$class, $method] = explode('@', $action);
            $class = self::CONTROLLERS_NAMESPACE . '\\' . $class;
            if (class_exists($class)) {
                $class = new $class;
                if (method_exists($class, $method)) {
                    return call_user_func_array([$class, $method], []);
                }
            }
        }
        if (is_callable($action)) {
            return call_user_func($action);
        }
    }




    // !***********************************[ in progress ]*****************************
    static function postResolve(string $requestUri , $requestMethod)
    {
        if (stripos($requestUri, '?')) {
            $route = explode('?', $requestUri)[0];
        }
        $action = self::$routes[$requestMethod][$route] ?? null;

        if (!$action) {
            // in progress
        }
    }
}