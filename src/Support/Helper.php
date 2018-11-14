<?php

use Natural\Helpers\BaseHelper;
use Natural\Views\View;
use Natural\Routing\Route;
use Natural\Config\Config;

if (!function_exists('dump')) {
    function dumper($data)
    {
        return BaseHelper::dumper($data);
    }
}

if (!function_exists('dump_exit')) {
    function dump_exit($data)
    {
        return BaseHelper::dump_exit($data);
    }
}

if (!function_exists('view')) {
    function view($view, $data = []) {
        $compiler = new View;
        $compiler->make($view, $data);
    }
}

if (!function_exists('route')) {
    function route($name)
    {
        return Route::getRouteByName($name);
    }
}

if (!function_exists('config')) {
    function config($name)
    {
        $config = new Config();
        $config->loadConfigurationFiles(CONFIG_PATH);
        return $config->get($name);
    }
}

