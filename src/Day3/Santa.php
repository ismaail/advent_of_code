<?php

namespace Puzzle\Day3;

/**
 * Class Santa
 * @package Puzzle\Day3
 */
class Santa
{
    /**
     * @var int
     */
    private $x = 0;

    /**
     * @var int
     */
    private $y = 0;

    /**
     * @return int
     */
    public function getPositionX()
    {
        return $this->x;
    }

    /**
     * @return int
     */
    public function getPositionY()
    {
        return $this->y;
    }

    /**
     * @param int $x
     * @param int $y
     */
    private function updatePosition($x, $y)
    {
        $this->x += $x;
        $this->y += $y;
    }

    /**
     * Move Santa North by increasing y position by 1.
     */
    public function moveNorth()
    {
        $this->updatePosition(0, 1);
    }

    /**
     * Move Santa South by decreasing y positioin by 1.
     */
    public function moveSouth()
    {
        $this->updatePosition(0, -1);
    }

    /**
     * Move Santa South by decreasing x positioin by 1.
     */
    public function moveWest()
    {
        $this->updatePosition(-1, 0);
    }

    /**
     * Move Santa South by increasing x positioin by 1.
     */
    public function moveEast()
    {
        $this->updatePosition(1, 0);
    }
}
