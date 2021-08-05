<?php


namespace engine\components;


use ArrayIterator;
use Closure;
use Exception;
use IteratorAggregate;
use Traversable;

class Collection implements IteratorAggregate
{
    /**
     * @var array
     */
    protected array $items = [];

    /**
     * Collection constructor.
     * @param array $items
     */
    public function __construct(array $items = [])
    {
        $this->items = $items;
    }

    /**
     * @param $item
     * @return $this
     */
    public function push($item): self
    {
        $this->items[] = $item;
        return $this;
    }

    /**
     * @param Closure $closure
     * @return $this
     */
    public function transform(Closure $closure): self
    {
        foreach ($this->items as $key => $item)
        {
            $this->items[$key] = $closure($item);
        }

        return $this;
    }

    /**
     * @return ArrayIterator
     */
    public function getIterator(): ArrayIterator
    {
        return new ArrayIterator($this->items);
    }
}