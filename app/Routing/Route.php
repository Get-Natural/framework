<?php

use App\Natural;

class Route extends Natural {

    public $request;

    public function __construct()
    {
        parent::__construct();
    }

    public static $getRoutes = [];
    public static $postRoutes = [];

    public static function post($route, $function, $name = null)
    {
        self::$postRoutes[$route]['route'] = $route;
        self::$postRoutes[$route]['function'] = $function;
        self::$postRoutes[$route]['name'] = $name;
    }

    public static function get($route, $function, $name = null)
    {
        self::$getRoutes[$route]['route'] = $route;
        self::$getRoutes[$route]['function'] = $function;
        self::$getRoutes[$route]['name'] = $name;
    }

    public function handle($request)
    {
        $method = $request->getMethod();
        $url = $request->getPathInfo();
        switch ($method) {
            case 'POST':
                $this->postRequest($url);
                break;
            default:
                $this->getRequest($url);
                break;
        }
    }

    /**
     * Handle GET request
     *
     * @param mixed $request
     */
    public function getRequest($url)
    {
        foreach (self::$getRoutes as $route) {
            if ($route['route'] === $url) {
                return $route['function']->__invoke();
            }
        }

        return $this->show404();
    }

    /**
     * Handle POST request
     *
     * @param mixed $request
     */
    public function postRequest($url)
    {
        foreach (self::$postRoutes as $route) {
            if ($route['route'] === $url) {
                return $route['function']->__invoke();
            }
        }

        return $this->show404();
    }

    public function show404() {
        header("HTTP/1.0 404 Not Found");
        return view('errors.404');
    }
}
