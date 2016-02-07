<?php

namespace Puzzle\Day2;

use Puzzle\Playable;

/**
 * Class Play
 * @package Puzzle\Day2
 */
class Play implements Playable
{
    /**
     * @return string
     */
    public function play()
    {
        $present = new Present();
        $parser = new InstructionParser($present);

        $file = '/../../data/instructions/day2.dat';

        $parser->parse(file_get_contents(__DIR__ . $file));

        return sprintf('Total area for all presents: %d', $parser->getTotalArea());
    }

}
