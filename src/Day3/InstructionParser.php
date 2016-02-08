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
     * @var AbstractSanta
     */
    private $roboSanta;

    /**
     * InstructionParser constructor.
     *
     * @param Area $area
     * @param AbstractSanta $santa
     * @param AbstractSanta $roboSanta
     */
    public function __construct(Area $area, AbstractSanta $santa, AbstractSanta $roboSanta)
    {
        $this->area = $area;
        $this->santa = $santa;
        $this->roboSanta = $roboSanta;

        // Add the House at Santa's position to the Area houses list.
        $startHouse = new House();
        $this->area[$this->positionToOffset($santa)] = $startHouse;

        // Both Santa & RoboSanta will give a Present to this House.
        $santa->givePresent($startHouse);
        $roboSanta->givePresent($startHouse);
    }

    /**
     * @param AbstractSanta $distributor
     *
     * @return string
     */
    private function positionToOffset(AbstractSanta $distributor)
    {
        return sprintf('%d,%d', $distributor->getPositionX(), $distributor->getPositionY());
    }

    /**
     * @param string $source
     */
    public function parse($source)
    {
        $directions = str_split(trim($source));

        array_map([$this, 'process'], array_keys($directions), $directions);
    }

    /**
     * @param int $index
     * @param string $direction
     */
    private function process($index, $direction)
    {
        $distributor = $this->getCurrentDistributor($index);

        switch ($direction) {
            case '^':
                $distributor->moveNorth();
                break;

            case '>':
                $distributor->moveEast();
                break;

            case 'v':
                $distributor->moveSouth();
                break;

            case '<':
                $distributor->moveWest();
                break;

            default:
                throw new \InvalidArgumentException("Invalid direction is given.");
        }

        $this->giveNewPresent($distributor);
    }

    /**
     * Who's turn to move and give Presents.
     *
     * @param int $index
     */
    private function getCurrentDistributor($index)
    {
        return (0 === $index % 2) ? $this->santa : $this->roboSanta;
    }

    /**
     * Give the house at this position a new Present.
     *
     * @param AbstractSanta $distributor
     */
    private function giveNewPresent(AbstractSanta $distributor)
    {
        $house = $this->area->getOrCreate($this->positionToOffset($distributor));

        $distributor->givePresent($house);
    }
}
