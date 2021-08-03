<?php

namespace engine\traits;

trait Renderable
{
    /**
     * @param string $path
     * @param array $data
     * @param string $layoutAlias
     * @return mixed
     */
    abstract public function view(string $path, array $data = [], $layoutAlias = '');
}