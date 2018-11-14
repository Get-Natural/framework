<?php
namespace App\Natural;

use Dotenv\Dotenv;
use Whoops;
use Symfony\Component\HttpFoundation\Request as Request;
use Natural\Config\Config;
use Natural\Routing\Route;

class Start {

    /**
     * @var Request
     */
    private $request;

    /**
     * @var Config
     */
    private $config;

    /**
     * @var array
     */
    protected $paths = [];

    /**
     * AppStart constructor.
     */
    public function __construct()
    {

        /**
         * Load file paths
         * ---------------------------------------------------
         */

        $this->setupPaths();

        /**
         * Start Building Application
         * ---------------------------------------------------
         */

        $dotenv = new Dotenv(BASE_PATH);
        $dotenv->load();

        /**
         * Set-up config
         * ---------------------------------------------------
         */

        $this->config = new Config();
        $this->config->loadConfigurationFiles(CONFIG_PATH);

        /**
         * Start Building Application
         * ---------------------------------------------------
         */

        $this->ErrorHandling();

        /**
         * Routing
         * ---------------------------------------------------
         */
        $this->request = Request::createFromGlobals();

        $this->routeHandling();


    }

    /**
     *
     */
    private function ErrorHandling() {

        error_reporting(E_ALL);

        $debug = $this->config->get('app.debug');

        $run = new Whoops\Run;
        if ($debug) {
            ini_set('display_errors', 1);
            $run->pushHandler(new Whoops\Handler\PrettyPageHandler);
            assert_options(ASSERT_ACTIVE, true);
        } else {
            ini_set('display_errors', 0);
            $run->pushHandler(function($e){
                $debugging = new Debug();
                $debugging->outputFriendlyError();
                $debugging->sendDevEmail();
            });
        }
        $run->register();
    }

    /**
     *
     */
    private function routeHandling() {

        // Get all routes
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



