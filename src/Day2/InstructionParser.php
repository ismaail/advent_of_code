<?php

namespace Puzzle\Day2;

/**
 * Class InstructionParser
 * @package Puzzle\Day2
 */
class InstructionParser
{
    /**
     * @var Present
     */
    private $present;

    /**
     * @var int
     */
    private $totalArea = 0;

    /**
     * InstructionParser constructor.
     *
     * @param Present $present
     */
    public function __construct(Present $present)
    {
        $this->present = $present;
    }

    /**
     * @param string $source
     */
    public function parse($source)
    {
        array_map([$this, 'process'],  explode(PHP_EOL, $source));
    }

    /**
     * @param string $input
     */
    private function process($input)
    {
        if (empty($input)) {
            return;
        }

        $dimension = explode('x', $input);

        if (3 !== count($dimension)) {
            throw new \InvalidArgumentException(
                sprintf("Gift expected to have 3 dimensions, but has %d", count($dimension))
            );
        }
        $this->totalArea += $this->present->getArea($dimension);
    }

    /**
     * @return int
     */
    public function getTotalArea()
    {
        return $this->totalArea;
    }
}
