<?php

namespace engine\components;

use engine\Application;

class Router
{
    /**
     * @var array
     * bolor router@ pahum enq $routes-i mej
     */
    protected array $routes;

    /**
     * Router constructor.
     * $routs key-in poxancum enq rout.php -ii veradarcrac zangvac@
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
        /** @var Application $path */
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