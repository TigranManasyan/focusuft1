<?php

namespace classes;
use abstractclass\AbstractClass;

class ExtedsAbstractClass extends AbstractClass{
    public function __construct($value) {
        $this->isValid($value);
    }
}
