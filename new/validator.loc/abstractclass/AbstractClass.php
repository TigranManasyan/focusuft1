<?php

namespace abstractclass;
use interfaces\RuleInterface;

abstract class AbstractClass implements RuleInterface{
    use \traits\FirstTrait;
//    public function __construct() {
//        echo "abstract class <br/>";
//    }
    public static function abstractFunction(){
        echo "abstractFunction<br/>";
    }
    public function isValid($value): bool
    {
        echo "realization RuleInterface isValid function";
        return true;
    }
    public function message($key): string
    {
        echo "realization RuleInterface message function";
        return "true";
    }
}
