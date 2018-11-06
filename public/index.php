<?php
    define('BASE_PATH', __DIR__. '/../');
    define('STORAGE_PATH', __DIR__. '/../storage/');

    /*
     * Load Composer packages
     */
    require "../vendor/autoload.php";
    require_once "../natural/app/start.php";
    require_once '../routes/Route.php';
