<?php

namespace rules;

use interfaces\RuleInterface;

class Required implements RuleInterface{
    public function IsValid($value): bool
    {
        if ($value) {
            return true;
        }
        return false;
    }
    public function message($key): string 
    {
        return "$key maust be required";
    }
}
