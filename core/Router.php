<?php

namespace app\core;

use app\core\exception\NotFoundException;

class Router
{
    protected $routes = [];
    public $request;
    public $response;

    public function __construct(Request $request, Response $response)
    {
        $this->request = $request;
        $this->response = $response;
    }

    public function get($path, $callback)
    {
        $this->routes['get'][$path] = $callback;
    }

    public function post($path, $callback)
    {
        $this->routes['post'][$path] = $callback;
    }

    public function resolve()
    {
        $path = $this->request->getPath();
        $method = $this->request->method();
        $callback = $this->routes[$method][$path] ?? false;
        if ($callback === false) {
            $this->response->setStatusCode(404);
            throw new NotFoundException();
        }
        if (is_string($callback)) {
            return $this->renderView($callback);
        }
        if (is_array($callback)) {
            Application::$app->setController(new $callback[0]);
            Application::$app->getController()->action = $callback[1];
            $callback[0] = Application::$app->getController();

            foreach (Application::$app->getController()->getMiddlewares() as $middleware) {
                $middleware->execute();
            }
        }
        return call_user_func($callback, $this->request, $this->response);
    }

    public function renderView($view, $params = [])
    {
        $layoutContent = $this->layoutContent();
        $viewContent = $this->renderOnlyView($view, $params);
        return str_replace('{{ content }}', $viewContent, $layoutContent);
    }

    // public function renderContent($viewContent)
    // {
    //     $layoutContent = $this->layoutContent();
    //     return str_replace('{{ content }}', $viewContent, $layoutContent);
    // }

    protected function layoutContent()
    {
        $layout = Application::$app->layout;
        if (Application::$app->getController()) {
            $layout = Application::$app->getController()->layout;
        }
        ob_start();
        include_once Application::$ROOT_DIR . "/views/layouts/$layout.php";
        return ob_get_clean();
    }

    protected function renderOnlyView($view, $params)
    {
        foreach ($params as $key => $value) {
            $$key = $value;
        }
        ob_start();
        include_once Application::$ROOT_DIR . "/views/$view.php";
        return ob_get_clean();
    }
}
