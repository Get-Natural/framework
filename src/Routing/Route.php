<?php

namespace Natural\Routing;

use InvalidArgumentException;
use Natural\Config\Config;
use Natural\Natural;

class Route extends Natural {

    /**
     * @var
     */
    public $request;

    /**
     * @var array
     */
    public static $getRoutes = [];

    /**
     * @var array
     */
    public static $postRoutes = [];

    public function __construct()
    {
        parent::__construct();
    }

    /**
     * @param $route
     * @param $function
     * @param null $name
     */
    public static function post($route, $function, $name = null)
    {
        $routeArray = [
            'route' => $route,
            'function' => $function,
            'name' => $name,
        ];
        self::$postRoutes[] = $routeArray;
    }

    /**
     * @param $route
     * @param $function
     * @param null $name
     */
    public static function get($route, $function, $name = null)
    {
        $routeArray = [
            'route' => $route,
            'function' => $function,
            'name' => $name,
        ];
        self::$getRoutes[] = $routeArray;
    }

    /**
     * @param $request
     */
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

    /**
     * @param $name
     * @return string
     */
    public static function getRouteByName($name)
    {
        $allRoutes = array_merge(self::$getRoutes, self::$postRoutes);
        foreach ($allRoutes as $route) {
            if ($route['name'] === $name) {
                return getenv('SITE_URL') . $route['route'];
            }
        }

        throw new InvalidArgumentException('Route ["'.$name.'"] not found');
    }

    /**
     *
     */
    public function show404() {

        if (config('app.debug')) {
            Throw new InvalidArgumentException('Route not defined');
        }

        header("HTTP/1.0 404 Not Found");
        return view('errors.404');
    }
}
