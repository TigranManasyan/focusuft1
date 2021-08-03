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
     * @var string
     */
    protected static string $layoutAlias;


    /**
     * View constructor.
     * @param $path
     * @param array $data
     * @param string $layoutAlias
     */
    public function __construct($path, $data = [], $layoutAlias = null)
    {
        $this->data = $data;
        $this->path = $path;
        self::$layoutAlias = $layoutAlias ?: 'default';
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
        $content = ob_get_clean();

        ob_start();
        extract(Application::$configs['layouts'][self::$layoutAlias]['data']);
        require ROOT . Application::$configs['views']['path'] . Application::$configs['layouts'][self::$layoutAlias]['path'];
        return ob_get_clean();
    }
}