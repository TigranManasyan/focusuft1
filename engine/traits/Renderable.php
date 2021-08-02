<?php

namespace engine\traits;

trait Renderable
{
    abstract public function view(string $path, array $data = []);
}