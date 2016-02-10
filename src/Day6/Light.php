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
     *
     * @deprecated  Light Status no longer used.
     */
    const STATUS_OFF = false;

    /**
     * @const bool
     *
     * @deprecated  Light Status no longer used.
     */
    const STATUS_ON = true;

    /**
     * @var int
     *
     * @deprecated  Light Status no longer used.
     */
    private $status = self::STATUS_OFF;

    /**
     * @return bool
     *
     * @deprecated  Light Status no longer used.
     */
    public function isOn()
    {
        return ($this->status === self::STATUS_ON);
    }

    /**
     * @return bool
     *
     * @deprecated  Light Status no longer used.
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
