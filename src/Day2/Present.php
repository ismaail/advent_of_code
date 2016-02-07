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
        if (3 !== count($dimensions)) {
            throw new \InvalidArgumentException(
                sprintf("Gift expected to have 3 dimensions, but has %d", count($dimensions))
            );
        }

        sort($dimensions);

        $area = (
            ($dimensions[0] * $dimensions[1] * 2) +
            ($dimensions[0] * $dimensions[2] * 2) +
            ($dimensions[1] * $dimensions[2] * 2) +
            ($dimensions[0] * $dimensions[1])
        );

        return $area;
    }
}
