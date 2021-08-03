<?php


//Application.php  running the this project
use engine\Application;

//Root dir
define('ROOT', __DIR__ . '/../');

//connect file autoload.php where spl_autoload_register function  connect all classes
require ROOT . 'engine/boostrap/autoload.php';

/** @var Application $app */
$app = new Application();

/** @var Object $app */
$app->run();
