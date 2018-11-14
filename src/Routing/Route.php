<?php

namespace Natural\Routing;

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
        $routeArray = [
            'route' => $route,
            'function' => $function,
            'name' => $name,
        ];
        self::$postRoutes[] = $routeArray;
    }

    public static function get($route, $function, $name = null)
    {
        $routeArray = [
            'route' => $route,
            'function' => $function,
            'name' => $name,
        ];
        self::$getRoutes[] = $routeArray;
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
     * @param mixed $url
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
     * @param mixed $url
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

    public static function getRouteByName($name)
    {
//        $request = Request::createFromGlobals();
        $allRoutes = array_merge(self::$getRoutes, self::$postRoutes);
        foreach ($allRoutes as $route) {
            if ($route['name'] === $name) {
                return getenv('SITE_URL') . $route['route'];
            }
        }

        throw new InvalidArgumentException('Route ["'.$name.'"] not found');
    }

    public function show404() {
        header("HTTP/1.0 404 Not Found");
        return view('errors.404');
    }
}
