<?php

namespace Puzzle\Day3;

/**
 * Class House
 * @package Puzzle\Day3
 */
class House
{
    /**
     * @var int
     */
    private $presents = 0;

    /**
     * @return int
     */
    public function countPresents()
    {
        return $this->presents;
    }

    /**
     * Receive New Present.
     */
    public function givePresent()
    {
        $this->presents++;
    }
}
