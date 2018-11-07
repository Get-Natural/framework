<?php

use Symfony\Component\HttpFoundation\Request as Request;
use App\Natural;

class Route extends Natural {

    public function __construct()
    {
        parent::__construct();
    }

    public static $validateRoutes = [];

    public static function set($route, $function)
    {
        $request = Request::createFromGlobals();
        self::$validateRoutes[] = $route;

        if ($request->getPathInfo() == $route) {
            return $function->__invoke();
        }
    }
}
