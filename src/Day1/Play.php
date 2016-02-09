<?php

namespace Puzzle\Day1;

use Puzzle\Playable;
use Puzzle\FileRead;

/**
 * Class Play
 * @package Puzzle\Day1
 */
class Play implements Playable
{
    use FileRead;

    /**
     * @return string
     */
    public function play()
    {
        $elevator = new Elevator();
        $parser = new InstructionParser($elevator);

        $parser->parse($this->read(1));

        return sprintf(
            "Elevator is at floor #%d. Entered Basement at %d char.",
            $elevator->getFloor(),
            $parser->getEnterdBasementAt()
        );
    }
}
