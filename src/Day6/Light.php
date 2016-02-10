<?php

namespace Puzzle\Day6;

/**
 * Class Light
 * @package Puzzle\Day6
 */
class Light
{
    /**
     * @var int
     */
    private $brightness = 0;

    /**
     * @return int
     */
    public function getBrightness()
    {
        return $this->brightness;
    }

    /**
     * Increase Light Brightness by 1.
     *
     * Turn light ON
     */
    public function turnOn()
    {
        $this->brightness++;
    }

    /**
     * Decrease Light Brightness by 1 with a minimum of 0.
     *
     * Turn light Off
     */
    public function turnOff()
    {
        if ($this->brightness > 0) {
            $this->brightness--;
        }
    }

    /**
     * Increase Light Brightness by 2.
     * Toggle light
     */
    public function toggle()
    {
        $this->brightness += 2;
    }
}
