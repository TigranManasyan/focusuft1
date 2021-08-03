<?php


namespace engine\components;


class Request
{
    /**
     * @return string
     */
    public function getPath(): string
    {
        /**
         * @var TYPE_NAME $_SERVER
         * Get URI
         */
        return $_SERVER['REQUEST_URI'];
    }
}