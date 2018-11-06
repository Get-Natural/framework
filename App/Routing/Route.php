<?php
use Symfony\Component\HttpFoundation\Request;

class Route {
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
