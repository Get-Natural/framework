<?php
namespace App;

use Dotenv\Dotenv;
use Whoops;

class AppStart {

    public function __call($method, $parameters)
    {
        define('BASE_PATH', realpath(__DIR__. '/../'));
        define('STORAGE_PATH', realpath(__DIR__. '/../storage'));
        /**
         * Start Building Application
         * ---------------------------------------------------
         * Nice up the error screens
         */
        $whoops = new Whoops\Run;
        $whoops->pushHandler(new Whoops\Handler\PrettyPageHandler);
        $whoops->register();

        /**
         * Start Building Application
         * ---------------------------------------------------
         * Nice up the error screens
         */

        $dotenv = new Dotenv(BASE_PATH);
        $dotenv->load();

        /**
         * Routing
         * ---------------------------------------------------
         */
        require_once BASE_PATH . '/routes/Route.php';
    }
}



