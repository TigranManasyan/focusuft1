<?php

use controllers\HomeController;
use controllers\NewsController;

return [
    '/' => [
        'controller' => HomeController::class,
        'action' => 'index'
    ],
    '/news' => [
        'controller' => NewsController::class,
        'action' => 'index'
    ]
];