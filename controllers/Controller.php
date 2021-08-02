<?php


namespace controllers;


use engine\components\View;
use engine\traits\Renderable;

abstract class Controller
{
    use Renderable;

    /**
     * @param string $path
     * @param array $data
     * @return View
     */
    public function view(string $path, array $data = []): View
    {
        return new View($path, $data);
    }
}