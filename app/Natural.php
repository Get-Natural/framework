<?php

namespace App;

use Symfony\Component\HttpFoundation\Request as Request;

class Natural {

    public $request;

    public function __construct()
    {
        $this->request = Request::class;
    }
}
