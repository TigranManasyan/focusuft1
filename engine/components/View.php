<?php


namespace engine\components;


use engine\Application;

class View extends Response
{
    /**
     * @var string
     */

    /**
     * @var array
     */
    public array $data;

    /**
     * @var string
     */
    public string $path;

    /**
     * View constructor.
     * @param $path
     * @param $data
     */
    public function __construct($path, $data = [])
    {
        $this->data = $data;
        $this->path = $path;
        parent::__construct();
    }

    /**
     * @return string
     */
    protected function setContent(): string
    {
        ob_start();
        extract($this->data);
        require ROOT . Application::$configs['views']['path'] . $this->path;
        return ob_get_clean();
    }
}