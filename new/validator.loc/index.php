<?php

use rules\Required;
use rules\Numeric;

$data = [
    'name' => 'Arshak',
    'age' => 27
];

spl_autoload_register(function($class){
    require $class . '.php';
});

$rules = [
    'name' => [new Required],
    'age' => [new Required, new Numeric]
];

$validator = new Validator();
$validator->validate($data, $rules);

new \abstractclass\realizeAbstractClass;

use classes\ExtedsAbstractClass;
new ExtedsAbstractClass("45");