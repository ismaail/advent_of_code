<?php

namespace Puzzle\Day3;

/**
 * Class Area
 * @package Puzzle\Day3
 */
class Area implements \ArrayAccess, \Countable
{
    /**
     * @var array
     */
    private $houses = [];

    /**
     * @param string $offset
     *
     * @return bool
     */
    public function offsetExists($offset)
    {
        return isset($this->houses[$offset]);
    }

    /**
     * @param string  $offset
     *
     * @return House
     */
    public function offsetGet($offset)
    {
        return $this->houses[$offset];
    }

    /**
     * @param string $offset
     * @param House $value
     */
    public function offsetSet($offset, $value)
    {
        if (! $this->isOffsetValid($offset)) {
            throw new \InvalidArgumentException("Invalid offset, must be follow this format 'x,y' string");
        }

        if (! $value instanceof House) {
            throw new \InvalidArgumentException(sprintf("Expecting House class instance, got a %s", gettype($value)));
        }

        $this->houses[$offset] = $value;
    }

    /**
     * @param string $offset
     */
    public function offsetUnset($offset)
    {
        if ($this->offsetExists($offset)) {
            unset($this->houses[$offset]);
        }
    }

    /**
     * @return int
     */
    public function count()
    {
        return count($this->houses);
    }

    /**
     * @param mixed $offset
     */
    private function isOffsetValid($offset)
    {
        if (! is_string($offset)) {
            return false;
        }

        $patter = '/^(-?\d+,-?\d+)$/';

        preg_match($patter, $offset, $matches);

        if (! $matches) {
            return false;
        }

        return true;
    }

    /**
     * Get House at this offset or create it if not found.
     *
     * @param string $offset
     *
     * @return House
     */
    public function getOrCreate($offset)
    {
        if ($this->offsetExists($offset)) {
            return $this->offsetGet($offset);
        }

        $house = new House();
        $this->offsetSet($offset, $house);

        return $house;
    }
}
