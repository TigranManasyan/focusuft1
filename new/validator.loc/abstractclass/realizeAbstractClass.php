<?php

namespace abstractclass;


class realizeAbstractClass extends AbstractClass{
    public function __construct() {
        parent::__construct();
        static::abstractFunction();
    }
}
