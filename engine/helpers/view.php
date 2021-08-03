<?php

use engine\components\View;

if (! function_exists('view'))
{
    /**
     * @param string $path
     * @param array $data
     * @param string $layoutAlias
     * @return View
     */
    function view(string $path, array $data = [], $layoutAlias = ''): View
    {
        return new View($path, $data, $layoutAlias);
    }
}