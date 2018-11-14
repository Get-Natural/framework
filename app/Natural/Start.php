<?php
namespace App\Natural;

use Natural\Natural;
use Symfony\Component\HttpFoundation\Request as Request;
use Natural\Routing\Route;

class Start extends Natural {

    /**
     * @var Request
     */
    public $request;

    /**
     * @var array
     */
    protected $paths = [];

    public function __construct()
    {
        $this->setupPaths();
        parent::__construct();
        $this->request = Request::createFromGlobals();
        $this->routeHandling();
    }

    /**
     * Request Handling
     */
    private function routeHandling()
    {
        require_once BASE_PATH . '/routes/Route.php';

        $route = new Route();
        $route->handle($this->request);
    }

    /**
     *  Set up base paths
     */
    private function setupPaths()
    {
        define('BASE_PATH', realpath(__DIR__ . '/../../'));
        define('STORAGE_PATH', realpath(BASE_PATH . '/storage'));
        define('CONFIG_PATH', realpath(BASE_PATH . '/config'));
    }
}



