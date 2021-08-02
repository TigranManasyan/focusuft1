<?php

namespace engine\components;

use engine\Application;

class Router
{
    /**
     * @var array
     */
    protected array $routes;

    /**
     * Router constructor.
     */
    public function __construct()
    {
        $this->routes = require ROOT . 'routes/route.php';
    }

    /**
     * @return mixed
     */
    public function getController()
    {
        $path = Application::$request->getPath();
        return $this->routes[$path]['controller'];
    }

    /**
     * @return mixed
     */
    public function getAction()
    {
        $path = Application::$request->getPath();
        return $this->routes[$path]['action'];
    }
}