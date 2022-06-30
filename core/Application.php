<?php

namespace app\core;

class Application
{
    public static $ROOT_DIR;
    public static $app;

    private $controller;
    public $request;
    public $response;
    public $session;
    public $router;
    public $db;

    public function __construct($rootPath, array $config)
    {
        self::$ROOT_DIR = $rootPath;
        self::$app = $this;
        $this->request = new Request();
        $this->response = new Response();
        $this->session = new Session();
        $this->router = new Router($this->request, $this->response);

        $this->db = new Database($config['db']);
    }

    public function run() {
        echo $this->router->resolve();
    }

    public function getController() {
        return $this->controller;
    }

    public function setController(Controller $controller) {
        return $this->controller = $controller;
    }
}
