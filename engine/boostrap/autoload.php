<?php

spl_autoload_register(function ($class_name) {

    /** @var  $class_name */
    require(ROOT . $class_name . ".php");
});

require ROOT . 'engine/helpers/view.php';