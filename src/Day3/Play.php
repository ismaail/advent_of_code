<?php

namespace Puzzle\Day3;

use Puzzle\Playable;
use Puzzle\FileRead;

/**
 * Class Play
 * @package Puzzle\Day3
 */
class Play implements Playable
{
    use FileRead;

    /**
     * @return string
     */
    public function play()
    {
        $area = new Area();
        $santa = new Santa();
        $roboSanta = new RoboSanta();

        $parser = new InstructionParser($area, $santa, $roboSanta);

        $parser->parse($this->read(3));

        return sprintf('Total houses visited by Santa: %d house', count($area));
    }
}
