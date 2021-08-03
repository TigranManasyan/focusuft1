<?php

use controllers\HomeController;
use controllers\NewsController;
use controllers\UserController;

return [
    '/' => [
        'controller' => HomeController::class,
        'action' => 'index'
    ],
    '/news' => [
        'controller' => NewsController::class,
        'action' => 'index'
    ],
    '/users' => [
        'controller' => UserController::class,
        'action' => 'index'
    ]
];