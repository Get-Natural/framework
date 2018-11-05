<?php 
use Whoops;
use Dotenv\Dotenv;

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
    
