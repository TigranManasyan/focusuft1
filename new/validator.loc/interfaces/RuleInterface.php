<?php


namespace interfaces;

interface RuleInterface {
    public function isValid($value): bool;
    public function message($key): string;
}
