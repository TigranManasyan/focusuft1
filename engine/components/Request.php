<?php


namespace engine\components;


class Request
{
    /**
     * @return string
     */
    public function getPath(): string
    {
        return $_SERVER['REQUEST_URI'];
    }
}