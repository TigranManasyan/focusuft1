<?php

use engine\components\View;

if (! function_exists('view'))
{
    /**
     * @param string $path
     * @param array $data
     * @return View
     */
    function view(string $path, array $data = []): View
    {
        return new View($path, $data);
    }
}