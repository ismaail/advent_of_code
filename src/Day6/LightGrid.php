<?php

namespace Puzzle\Day6;

use Puzzle\BaseGrid;

/**
 * Class Grid
 * @package Puzzle\Day6
 */
class LightGrid extends BaseGrid
{
    /**#@+
     * @const int
     */
    const LIGHT_ACTION_TURN_OFF = 'turn off';
    const LIGHT_ACTION_TURN_ON = 'turn on';
    const LIGHT_ACTION_TOGGLE = 'toggle';
    /**#@-*/

    /**
     * @param string $offset
     * @param House $value
     */
    public function offsetSet($offset, $value)
    {
        if (! $this->isOffsetValid($offset)) {
            throw new \InvalidArgumentException("Invalid offset value, must follow this format 'x,y' string");
        }

        if (! $value instanceof Light) {
            throw new \InvalidArgumentException(sprintf("Expecting Light class instance, got a %s", gettype($value)));
        }

        $this->list[$offset] = $value;
    }

    /**
     * Get Light at this offset or create it if not found.
     *
     * @param string $offset
     *
     * @return Light
     */
    public function offsetGetorCreate($offset)
    {
        if ($this->offsetExists($offset)) {
            return $this->offsetGet($offset);
        }

        $light = new Light();
        $this->offsetSet($offset, $light);

        return $light;
    }

    /**
     * @param array $start
     * @param array $end
     * @param int $lightAction
     */
    public function setUpLights(array $start, array $end, $lightAction)
    {
        if ($start[0] > $end[0] || $start[1] > $end[1]) {
            throw new \InvalidArgumentException('Start position is expected to be smaller than the end position.');
        }

        for ($i = $start[0]; $i <= $end[0]; $i++) {
            for ($j = $start[1]; $j <= $end[1]; $j++) {
                $light = $this->offsetGetorCreate(sprintf('%d,%d', $i, $j));
                $this->activate($light, $lightAction);
            }
        }
    }

    /**
     * @param Light $light
     * @param int $lightAction
     */
    private function activate(Light $light, $lightAction)
    {
        switch ($lightAction) {
            case self::LIGHT_ACTION_TURN_ON:
                $light->turnOn();
                break;

            case self::LIGHT_ACTION_TURN_OFF:
                $light->turnOff();
                break;

            case self::LIGHT_ACTION_TOGGLE:
                $light->toggle();
                break;
        }
    }
}
