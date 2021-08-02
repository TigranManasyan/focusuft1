<?php

namespace engine;

use engine\components\Request;
use engine\components\Router;

class Application
{
    public static array $configs;

    /**
     * @var Router
     */
    public static Router $router;

    /**
     * @var Request
     */
    public static Request $request;

    /**
     * Application constructor.
     */
    public function __construct()
    {

        self::$request = new Request();
        self::$router = new Router();
        self::$configs = require ROOT . 'configs/app.php';
    }

    public function run()
    {
        $controller = self::$router->getController();
        echo (new $controller)->{self::$router->getAction()}();
    }
}