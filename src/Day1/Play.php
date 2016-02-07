<?php

namespace Puzzle\Day1;

use Puzzle\Playable;

/**
 * Class Play
 * @package Puzzle\Day1
 */
class Play implements Playable
{
    /**
     * @return string
     */
    public function play()
    {
        $elevator = new Elevator();
        $parser = new InstructionParser($elevator);

        $file = '/../../data/instructions/day1.dat';

        $parser->parse(file_get_contents(__DIR__ . $file));

        return sprintf("Elevator is at floor #%d.\n", $elevator->getFloor());
    }
}
