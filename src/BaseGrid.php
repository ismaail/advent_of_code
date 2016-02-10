<?php

namespace Puzzle;

/**
 * Class Baserid
 * @package Puzzle
 */
class BaseGrid implements \ArrayAccess, \Countable, \Iterator
{
    /**
     * @var array
     */
    protected $list = [];

    /**
     * @param string $offset
     *
     * @return bool
     */
    public function offsetExists($offset)
    {
        return isset($this->list[$offset]);
    }

    /**
     * @param string  $offset
     *
     * @return mixed
     */
    public function offsetGet($offset)
    {
        return $this->list[$offset];
    }

    /**
     * @inheritDoc
     */
    public function offsetSet($offset, $value)
    {
        $this->list[$offset] = $value;
    }

    /**
     * @param string $offset
     */
    public function offsetUnset($offset)
    {
        if ($this->offsetExists($offset)) {
            unset($this->list[$offset]);
        }
    }

    /**
     * @return int
     */
    public function count()
    {
        return count($this->list);
    }

    /**
     * @param mixed $offset
     */
    protected function isOffsetValid($offset)
    {
        if (! is_string($offset)) {
            return false;
        }

        $pattern = '/^(-?\d+,-?\d+)$/';

        preg_match($pattern, $offset, $matches);

        return !empty($matches);
    }

    /**
     * @inheritDoc
     */
    public function current()
    {
        return current($this->list);
    }

    /**
     * @inheritDoc
     */
    public function next()
    {
        return next($this->list);
    }

    /**
     * @inheritDoc
     */
    public function key()
    {
        return key($this->list);
    }

    /**
     * @inheritDoc
     */
    public function valid()
    {
        return false !== current($this->list);
    }

    /**
     * @inheritDoc
     */
    public function rewind()
    {
        reset($this->list);
    }
}
