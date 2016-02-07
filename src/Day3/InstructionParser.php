<?php

namespace Puzzle\Day3;

/**
 * Class InstructionParser
 * @package Puzzle\Day3
 */
class InstructionParser
{
    /**
     * @var Area
     */
    private $area;

    /**
     * @var Santa
     */
    private $santa;

    /**
     * InstructionParser constructor.
     *
     * @param Area $area
     * @param Santa $santa
     */
    public function __construct(Area $area, Santa $santa)
    {
        $this->area = $area;
        $this->santa = $santa;

        $startHouse = new House();
        $startHouse->givePresent();

        $this->area[$this->positionToOffset()] = $startHouse;
    }

    /**
     * @return string
     */
    private function positionToOffset()
    {
        return sprintf('%d,%d', $this->santa->getPositionX(), $this->santa->getPositionY());
    }

    /**
     * @param string $source
     */
    public function parse($source)
    {
        array_map([$this, 'process'], str_split(trim($source)));
    }

    /**
     * @param $direction
     */
    private function process($direction)
    {
        switch ($direction) {
            case '^':
                $this->santa->moveNorth();
                break;

            case '>':
                $this->santa->moveEast();
                break;

            case 'v':
                $this->santa->moveSouth();
                break;

            case '<':
                $this->santa->moveWest();
                break;

            default:
                throw new \InvalidArgumentException("Invalid direction is given.");
        }

        $this->giveNewPresent();
    }

    /**
     * Santa Gives the house at his current position a new Present.
     */
    private function giveNewPresent()
    {
        $position = $this->positionToOffset();

        $house = $this->area->getOrCreate($position);

        $house->givePresent();
    }
}
