<?php

use engine\Application;

define('ROOT', __DIR__ . '/../');

require ROOT . 'engine/boostrap/autoload.php';

$app = new Application();
$app->run();