<?php

namespace rules;

use interfaces\RuleInterface;

class Numeric implements RuleInterface{
    public function IsValid($value): bool
    {
        if (gettype($value) === 'integer') {
            return true;
        }
        return false;
    }
    public function message($key): string 
    {
        return "$key maust be a numeric";
    }
}
