<?php


namespace engine\components;


abstract class Response
{
    /**
     * @var string
     */
    protected string $content = '';

    /**
     * Response constructor.
     */
    public function __construct()
    {
        $this->content = $this->setContent();
    }

    /**
     * @return void
     */
    public function render(): void
    {
        echo $this->content;
    }

    /**
     * @return string
     */
    public function __toString(): string
    {
        return $this->content;
    }

    /**
     * @return string
     */
    abstract protected function setContent(): string;
}