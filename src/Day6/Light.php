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
}
