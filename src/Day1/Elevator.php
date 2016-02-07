<?php

namespace Puzzle\Day1;

/**
 * Class Elevator
 * @package Puzzle\Day1
 */
class Elevator
{
    /**
     * @var int
     */
    private $floor = 0;

    /**
     * Get current floor
     *
     * @return int
     */
    public function getFloor()
    {
        return $this->floor;
    }

    /**
     * Go Up One Floor
     */
    public function goUp()
    {
        $this->floor++;
    }

    /**
     * Go Down One Floor
     */
    public function goDown()
    {
        $this->floor--;
    }
}
