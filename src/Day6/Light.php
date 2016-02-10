<?php

namespace Puzzle\Day6;

/**
 * Class Light
 * @package Puzzle\Day6
 */
class Light
{
    /**
     * @const bool
     */
    const STATUS_OFF = false;

    /**
     * @const bool
     */
    const STATUS_ON = true;

    /**
     * @var int
     */
    private $status = self::STATUS_OFF;

    /**
     * @var int
     */
    private $positionX = 0;

    /**
     * @var int
     */
    private $positionY = 0;

    /**
     * @return bool
     */
    public function isOn()
    {
        return ($this->status === self::STATUS_ON);
    }

    /**
     * @return bool
     */
    public function isOff()
    {
        return ($this->status === self::STATUS_OFF);
    }

    /**
     * Turn light ON
     */
    public function turnOn()
    {
        $this->status = self::STATUS_ON;
    }

    /**
     * Turn light Off
     */
    public function turnOff()
    {
        $this->status = self::STATUS_OFF;
    }

    /**
     * Toggle light
     */
    public function toggle()
    {
        $this->status = !$this->status;
    }

    /**
     * @return int
     */
    public function getPositionX()
    {
        return $this->positionX;
    }

    /**
     * @return int
     */
    public function getPositionY()
    {
        return $this->positionY;
    }
}
