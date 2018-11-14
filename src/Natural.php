<?php

namespace Natural;

use Symfony\Component\HttpFoundation\Request as Request;
use Dotenv\Dotenv;
use Whoops;

class Natural {

    public $request;

    protected $config;

    protected $dotenv;

    public function __construct()
    {
        $dotenv = new Dotenv(BASE_PATH);
        $dotenv->load();

        $this->request = Request::class;

        $this->ErrorHandling();
    }

    /**
     *
     */
    private function ErrorHandling() {

        error_reporting(E_ALL);

        $debug = config('app.debug');

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
}
