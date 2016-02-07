<?php

namespace Puzzle\Day2;

/**
 * Class Present
 * @package Puzzle\Day2
 */
class Present
{
    /**
     * @param array $dimensions
     *
     * @return int
     */
    public function getArea(array $dimensions)
    {
        sort($dimensions);

        return (
            ($dimensions[0] * $dimensions[1] * 2) +
            ($dimensions[0] * $dimensions[2] * 2) +
            ($dimensions[1] * $dimensions[2] * 2) +
            ($dimensions[0] * $dimensions[1])
        );
    }

    /**
     * @param array $dimensions
     *
     * @return int
     */
    public function getRibbon(array $dimensions)
    {
        sort($dimensions);

        return (
            (($dimensions[0] + $dimensions[1]) * 2) +
            ($dimensions[0] * $dimensions[1] * $dimensions[2])
        );
    }
}
