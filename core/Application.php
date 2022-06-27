<?php

namespace app\core;

class Application
{
    public $request;
    public $router;

    public function __construct()
    {
        $this->request = new Request();
        $this->router = new Router($this->request);
    }

    public function run() {
        $this->router->resolve();
    }
}
